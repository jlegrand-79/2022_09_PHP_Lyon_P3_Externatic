<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Form\CandidacyType;
use App\Repository\CandidacyRepository;
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
            $candidacies = $candidacyRepository->findAll();
        }

        return $this->render('candidacy/index.html.twig', [
            'candidacies' => $candidacies,
            'search' => $search
        ]);
    }

    #[Route('/{id}', name: 'app_candidacy_show', methods: ['GET'])]
    public function show(Candidacy $candidacy): Response
    {
        return $this->render('candidacy/show.html.twig', [
            'candidacy' => $candidacy,
        ]);
    }
}
