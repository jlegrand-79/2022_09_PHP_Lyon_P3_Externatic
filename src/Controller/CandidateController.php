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

#[Route('/candidate')]
class CandidateController extends AbstractController
{
    #[Route('/new', name: 'app_candidate_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        CandidateRepository $candidateRepository,
        UserRepository $userRepository
    ): Response {
        $userConnected = $this->container->get('security.token_storage')->getToken()->getUser();
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
            $candidateConnected = $candidateRepository->findOneBy(['user' => $userConnected->getId()]);

            return $this->redirectToRoute('app_candidate_show', [
                'id' => $candidateConnected->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidate_show', methods: ['GET'])]
    public function show(Candidate $candidate): Response
    {
        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }
}
