<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OfferType;
use App\Service\SearchBar;
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
        if ($request->isMethod('POST')) {
            $search = $request->get('search');
            $select = $request->get('city');
            $offers = $searchBar->searchOffer($search, $select);
        } else {
            $offers = $offerRepository->findBy(array(), array('id' => 'DESC'));
        }

        return $this->render('offer/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    #[Route('/list', name: 'app_offer_list', methods: ['GET', 'POST'])]
    public function list(Request $request, OfferRepository $offerRepository, SearchBar $searchBar): Response
    {
        if ($request->isMethod('POST')) {
            $search = $request->get('search');
            $select = $request->get('city');
            $offers = $searchBar->searchOffer($search, $select);
        } else {
            $offers = $offerRepository->findBy(array(), array('id' => 'DESC'));
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

    #[Route('/{id}', name: 'app_offer_show', methods: ['GET'])]
    public function show(int $id, OfferRepository $offerRepository, CandidacyRepository $candidacyRepository): Response
    {
        $offer = $offerRepository->findOneById($id);

        if ($this->container->get('security.token_storage')->getToken()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            if ($user->getInformation()) {
                $candidate = $user->getInformation();
                $candidacy = $candidacyRepository->findOneBy(['candidate' => $candidate, 'offer' => $offer]);
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

    #[Route('/{id}', name: 'app_offer_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Offer $offer, OfferRepository $offerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $offer->getId(), $request->request->get('_token'))) {
            if ($offer->getCandidacies() != false) {
                $this->addFlash(
                    'danger',
                    "Des candidatures sont en cours sur cette offre, elle ne peut pas être supprimée."
                );
            } else {
                $offerRepository->remove($offer, true);
                $this->addFlash('success', "L'offre a bien été supprimée.");
            }
        }

        return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
    }
}
