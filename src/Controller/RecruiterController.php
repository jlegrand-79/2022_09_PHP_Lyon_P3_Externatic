<?php

namespace App\Controller;

use App\Entity\Recruiter;
use App\Form\RecruiterType;
use App\Repository\RecruiterRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recruiter')]
class RecruiterController extends AbstractController
{
    #[Route('/', name: 'app_recruiter_index', methods: ['GET'])]
    #[IsGranted('ROLE_RECRUITER')]
    public function index(RecruiterRepository $recruiterRepository, UserRepository $userRepository): Response
    {
        $recruiters = $userRepository->findByRoleRecruiter();

        return $this->render('recruiter/index.html.twig', [
            'recruiters' => $recruiters,
        ]);
    }

    #[Route('/new', name: 'app_recruiter_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RecruiterRepository $recruiterRepository): Response
    {
        $recruiter = new Recruiter();
        $form = $this->createForm(RecruiterType::class, $recruiter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recruiterRepository->save($recruiter, true);

            return $this->redirectToRoute('app_recruiter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recruiter/new.html.twig', [
            'recruiter' => $recruiter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recruiter_show', methods: ['GET'])]
    public function show(int $id, RecruiterRepository $recruiterRepository): Response
    {
        $recruiter = $recruiterRepository->findOneById($id);

        return $this->render('recruiter/show.html.twig', [
            'recruiter' => $recruiter
        ]);
    }

    #[Route('/{id}/edit', name: 'app_recruiter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recruiter $recruiter, RecruiterRepository $recruiterRepository): Response
    {
        $form = $this->createForm(RecruiterType::class, $recruiter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recruiterRepository->save($recruiter, true);

            return $this->redirectToRoute('app_recruiter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recruiter/edit.html.twig', [
            'recruiter' => $recruiter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recruiter_delete', methods: ['POST'])]
    public function delete(Request $request, Recruiter $recruiter, RecruiterRepository $recruiterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $recruiter->getId(), $request->request->get('_token'))) {
            $recruiterRepository->remove($recruiter, true);
        }

        return $this->redirectToRoute('app_recruiter_index', [], Response::HTTP_SEE_OTHER);
    }
}
