<?php

namespace App\Controller;

use DateTime;
use App\Entity\Offer;
use App\Entity\Candidacy;
use App\Form\CandidacyType;
use App\Entity\Status;
use App\Repository\OfferRepository;
use App\Repository\CandidacyRepository;
use App\Repository\StatusRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/candidacy')]
class CandidacyController extends AbstractController
{
    #[Route('/', name: 'app_candidacy_index', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request, CandidacyRepository $candidacyRepository): Response
    {
        $search = false;
        if ($request->isMethod('POST')) {
            $title = $request->get('searchTitle');
            $name = $request->get('searchName');
            $date = $request->get('searchDate');

            $candidacies = $candidacyRepository->searchCandidacies($title, $name, $date);
            $search = true;
        } else {
            $candidacies = $candidacyRepository->findBy([], ['status' => 'ASC']);
        }

        return $this->render('candidacy/index.html.twig', [
            'candidacies' => $candidacies,
            'search' => $search
        ]);
    }

    #[Route('/recruiter', name: 'app_candidacy_recruiter_index', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_RECRUITER')]
    public function indexRecruiter(Request $request, CandidacyRepository $candidacyRepository): Response
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $recruiter = $user->getRecruiter();
        $recruiterId = $recruiter->getId();
        $search = false;
        if ($request->isMethod('POST')) {
            $title = $request->get('searchTitle');
            $name = $request->get('searchName');
            $date = $request->get('searchDate');

            $candidacies = $candidacyRepository->searchCandidaciesRecruiter($title, $name, $date, $recruiterId);
            $search = true;
        } else {
            $candidacies = $candidacyRepository->findByRecruiterId($recruiterId);
        }

        return $this->render('candidacy/recruiter.html.twig', [
            'recruiter' => $recruiter,
            'candidacies' => $candidacies,
            'search' => $search
        ]);
    }

    #[Route('/{id<\d+>}', name: 'app_candidacy_show', methods: ['GET'])]
    public function show(Candidacy $candidacy): Response
    {
        return $this->render('candidacy/show.html.twig', [
            'candidacy' => $candidacy,
        ]);
    }

    #[Route('/new/{id<\d+>}', name: 'app_candidacy_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_CANDIDATE')]
    public function new(
        CandidacyRepository $candidacyRepository,
        OfferRepository $offerRepository,
        StatusRepository $statusRepository,
        Request $request,
        int $id
    ): Response {
        if ($this->container->get('security.token_storage')->getToken()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            if ($user->getInformation()) {
                if ($user->getInformation()->getCurriculumVitae()) {
                    $candidate = $user->getInformation();
                    $offer = $offerRepository->findOneById($id);
                    if ($candidacyRepository->findBy(['candidate' => $candidate, 'offer' => $offer]) == false) {
                        $candidacy = new Candidacy();
                        $candidacy->setOffer($offer);
                        $candidacy->setCandidate($user->getInformation());
                        $candidacy->setCandidacyDate(new DateTime('now'));
                        $candidacy->setStatus($statusRepository->findOneByStatus('Nouvelle'));
                        $candidacyRepository->save($candidacy, true);

                        $this->addFlash(
                            'success',
                            'Votre candidature a bien été envoyée et sera étudiée dans les plus brefs délais.'
                        );
                    }
                } else {
                    $this->addFlash(
                        'danger',
                        'Veuillez vérifier vos informations et renseigner un CV avant de postuler à une offre.'
                    );
                    $session = $request->getSession();
                    $session->set('apply', $request->headers->get('referer'));
                    return $this->redirectToRoute('app_candidate_update', [], Response::HTTP_SEE_OTHER);
                }
            } else {
                $this->addFlash(
                    'danger',
                    'Veuillez compléter vos informations et renseigner un CV avant de postuler à une offre.'
                );
                $session = $request->getSession();
                $session->set('apply', $request->headers->get('referer'));
                return $this->redirectToRoute('app_candidate_new', [], Response::HTTP_SEE_OTHER);
            }
        }
        return $this->redirectToRoute('app_offer_show', ['id' => $id], Response::HTTP_SEE_OTHER);
    }
}
