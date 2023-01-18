<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use App\Repository\UserRepository;
use App\Repository\CandidateRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

#[Route('/candidate')]
class CandidateController extends AbstractController
{
    #[Route('/', name: 'app_candidate_index', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(
        Request $request,
        CandidateRepository $candidateRepository,
        UserRepository $userRepository
    ): Response {
        return $this->render('candidate/index.html.twig', [
            'candidates' => $candidateRepository->findAll(), 'users' => $userRepository->findAll(),

        ]);
    }


    #[Route('/new', name: 'app_candidate_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_CANDIDATE')]
    public function new(
        Request $request,
        CandidateRepository $candidateRepository,
        UserRepository $userRepository
    ): Response {
        $userConnected = $this->container->get('security.token_storage')->getToken()->getUser();
        if ($userConnected->getInformation() != null) {
            return $this->redirectToRoute('app_candidate_show', [
            ], Response::HTTP_SEE_OTHER);
        }

        $candidate = new Candidate();
        $candidate->setUser($userConnected);
        $form = $this->createForm(CandidateType::class, $candidate);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $stacks = $candidate->getStacks();
            if (count($stacks) <= 0) {
                $noStacks = 'Veuillez renseigner au moins une stack.';
                return $this->renderForm('candidate/new.html.twig', [
                    'candidate' => $candidate,
                    'form' => $form,
                    'noStacks' => $noStacks,
                ]);
            }
            $contractSearched = $candidate->getContractSearched();
            if (count($contractSearched) <= 0) {
                $noContractSearched = 'Veuillez renseigner au moins une stack.';
                return $this->renderForm('candidate/new.html.twig', [
                    'candidate' => $candidate,
                    'form' => $form,
                    'noContractSearched' => $noContractSearched,
                ]);
            }
            $candidateRepository->save($candidate, true);

            return $this->redirectToRoute('app_candidate_show', [
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/mypage', name: 'app_candidate_show', methods: ['GET'])]
    #[IsGranted('ROLE_CANDIDATE')]
    public function show(CandidateRepository $candidateRepository): Response
    {
        $userConnected = $this->container->get('security.token_storage')->getToken()->getUser();
        $userCandidateId = $userConnected->getInformation()->getId();
        $candidate = $candidateRepository->findOneBy(['id' => $userCandidateId]);
        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    #[Route('/{id}', name: 'app_candidate_admin_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function showAdmin(Candidate $candidate): Response
    {
        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }
}
