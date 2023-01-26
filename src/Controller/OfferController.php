<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OfferType;
use App\Service\SearchBar;
use App\Form\OfferRecruiterType;
use App\Controller\SearchOfferType;
use App\Repository\OfferRepository;
use App\Repository\CandidacyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/offer')]
class OfferController extends AbstractController
{
    #[Route('/', name: 'app_offer_index', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request, OfferRepository $offerRepository, SearchBar $searchBar): Response
    {
        $search = false;
        if ($request->isMethod('POST')) {
            $search = $request->get('search');
            $select = $request->get('city');
            $partner = $request->get('partner');
            $offers = $searchBar->searchOffer($search, $select, $partner);
            $search = true;
        } else {
            $offers = $offerRepository->findBy([], ['open' => 'DESC', 'id' => 'DESC', ]);
        }

        return $this->render('offer/index.html.twig', [
            'offers' => $offers,
            'search' => $search
        ]);
    }

    #[Route('/recruiter', name: 'app_offer_index_recruiter', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_RECRUITER')]
    public function recruiterOffers(Request $request, OfferRepository $offerRepository, SearchBar $searchBar): Response
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $recruiter = $user->getRecruiter();
        $search = false;
        if ($request->isMethod('POST')) {
            $search = $request->get('search');
            $select = $request->get('city');
            $offers = $searchBar->searchOfferByRecruiter($search, $select, $recruiter);
            $search = true;
        } else {
            $offers = $offerRepository->findBy(['recruiter' => $recruiter], ['open' => 'DESC', 'id' => 'DESC', ]);
        }

        return $this->render('offer/index_recruiter.html.twig', [
            'offers' => $offers,
            'search' => $search
        ]);
    }

    #[Route('/list', name: 'app_offer_list', methods: ['GET', 'POST'])]
    public function list(Request $request, OfferRepository $offerRepository, SearchBar $searchBar): Response
    {
        if ($request->isMethod('POST')) {
            $search = $request->get('search');
            $select = $request->get('city');
            $allOffers = $searchBar->searchOffer($search, $select);
            $offers = [];
            foreach ($allOffers as $offer) {
                if ($offer->isOpen() == true) {
                    $offers[] = $offer;
                }
            }
        } else {
            $offers = $offerRepository->findBy(['open' => true], ['id' => 'DESC']);
        }

        return $this->render('offer/list.html.twig', [
            'offers' => $offers,
        ]);
    }

    #[Route('/new', name: 'app_offer_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, OfferRepository $offerRepository): Response
    {
        $offer = new Offer();
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stacks = $offer->getStack();
            if (count($stacks) <= 0) {
                $noStacks = 'Veuillez renseigner au moins une stack.';
                return $this->renderForm('offer/new.html.twig', [
                    'offer' => $offer,
                    'form' => $form,
                    'no_stacks' => $noStacks,
                ]);
            }
            $offerRepository->save($offer, true);
            return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offer/new.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }

    #[Route('/new/recruiter', name: 'app_offer_new_recruiter', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_RECRUITER')]
    public function newRecruiterOffer(Request $request, OfferRepository $offerRepository): Response
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $offer = new Offer();
        $form = $this->createForm(OfferRecruiterType::class, $offer);
        $offer->setRecruiter($user->getRecruiter());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stacks = $offer->getStack();
            if (count($stacks) <= 0) {
                $noStacks = 'Veuillez renseigner au moins une stack.';
                return $this->renderForm('offer/new.html.twig', [
                    'offer' => $offer,
                    'form' => $form,
                    'no_stacks' => $noStacks,
                ]);
            }
            $offerRepository->save($offer, true);
            return $this->redirectToRoute('app_offer_index_recruiter', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offer/new.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offer_show', methods: ['GET'])]
    public function show(int $id, OfferRepository $offerRepository, CandidacyRepository $candidacyRepository): Response
    {
        $offer = $offerRepository->findOneById($id);

        if (!$this->isGranted('ROLE_EDITOR') && $offer->isOpen() == false) {
            $this->addFlash('danger', 'L\'offre recherchée n\'est plus disponible.');
            return $this->redirectToRoute('app_offer_list', [], Response::HTTP_SEE_OTHER);
        }

        if ($this->container->get('security.token_storage')->getToken()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            if ($user->getInformation()) {
                $candidate = $user->getInformation();
                $candidacy = $candidacyRepository->findOneBy(
                    ['candidate' => $candidate, 'offer' => $offer],
                    ['status' => 'ASC']
                );
                if ($candidacy != false) {
                    return $this->render('offer/show.html.twig', [
                        'offer' => $offer,
                        'candidacy' => $candidacy
                    ]);
                }
            }
        }
        return $this->render('offer/show.html.twig', [
            'offer' => $offer
        ]);
    }

    #[Route('/{id}/edit', name: 'app_offer_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Offer $offer, OfferRepository $offerRepository): Response
    {
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offerRepository->save($offer, true);

            return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offer/edit.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit/recruiter', name: 'app_offer_edit_recruiter', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_RECRUITER')]
    public function editRecruiterOffer(Request $request, Offer $offer, OfferRepository $offerRepository): Response
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if ($user->getRecruiter() != $offer->getRecruiter()) {
            return $this->redirectToRoute('app_offer_list', [], Response::HTTP_SEE_OTHER);
        }
        $form = $this->createForm(OfferRecruiterType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offerRepository->save($offer, true);

            return $this->redirectToRoute('app_offer_index_recruiter', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offer/edit.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offer_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Offer $offer, OfferRepository $offerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $offer->getId(), $request->request->get('_token'))) {
            if ($offer->getCandidacies()->isEmpty()) {
                $offerRepository->remove($offer, true);
                $this->addFlash('success', "L'offre sélectionnée a bien été supprimée.");
            } else {
                $this->addFlash(
                    'danger',
                    "Des candidatures sont en cours sur cette offre, elle ne peut pas être supprimée."
                );
            }
        }

        return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
    }
}
