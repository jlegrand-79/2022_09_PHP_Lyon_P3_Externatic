<?php

namespace App\Controller;

use App\Entity\Candidate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/candidate')]
class CandidateController extends AbstractController
{
    #[Route('/{id}', name: 'app_candidate_show', methods: ['GET'])]
    public function show(Candidate $candidate): Response
    {
        return $this->render('candidate/show.html.twig', [
            'user' => $candidate,
        ]);
    }
}
