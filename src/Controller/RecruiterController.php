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
#[IsGranted('ROLE_ADMIN')]
class RecruiterController extends AbstractController
{
    #[Route('/', name: 'app_recruiter_index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        UserRepository $userRepository
    ): Response {
        if ($request->isMethod('POST')) {
            $lastname = $request->get('lastname');
            $email = $request->get('email');
            $partner = $request->get('partner');
            $users = [];
            $returnedUsers = $userRepository->findRecruiterBy($lastname, $email, $partner);
            foreach ($returnedUsers as $user) {
                if (in_array("ROLE_RECRUITER", $user->getRoles())) {
                    $users[] = $user;
                }
            };
        } else {
            $users = $userRepository->findByRoleRecruiter();
        }

        return $this->render('recruiter/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/{id}/new', name: 'app_recruiter_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        RecruiterRepository $recruiterRepository,
        int $id,
        UserRepository $userRepository
    ): Response {
        $recruiter = new Recruiter();
        $recruiter->setUser($userRepository->findOneById($id));
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
    public function edit(
        Request $request,
        Recruiter $recruiter,
        RecruiterRepository $recruiterRepository
    ): Response {
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

    #[Route('/{id}/new', name: 'app_recruiter_admin_new', methods: ['GET', 'POST'])]
    public function newRecruiterAdmin(
        Request $request,
        RecruiterRepository $recruiterRepository,
        int $id,
        UserRepository $userRepository
    ): Response {
        $recruiter = new Recruiter();
        $recruiter->setUser($userRepository->findOneById($id));
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

    #[Route('/{id}', name: 'app_recruiter_delete', methods: ['POST'])]
    public function delete(Request $request, Recruiter $recruiter, RecruiterRepository $recruiterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $recruiter->getId(), $request->request->get('_token'))) {
            $recruiterRepository->remove($recruiter, true);
        }

        return $this->redirectToRoute('app_recruiter_index', [], Response::HTTP_SEE_OTHER);
    }
}
