<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use App\Repository\UserRepository;
use App\Repository\CandidateRepository;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/candidate')]
class CandidateController extends AbstractController
{
    #[Route('/', name: 'app_candidate_index', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(
        Request $request,
        UserRepository $userRepository
    ): Response {
        if ($request->isMethod('POST')) {
            $lastname = $request->get('lastname');
            $email = $request->get('email');
            $users = [];

            $candidateByFilters = $userRepository->findLikeLastnameOrEmail($lastname, $email);
            foreach ($candidateByFilters as $user) {
                if (in_array("ROLE_CANDIDATE", $user->getRoles())) {
                    $users[] = $user;
                }
            };
        } else {
            $users = $userRepository->findByRoleCandidate();
        }

        return $this->render('candidate/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/new', name: 'app_candidate_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_CANDIDATE')]
    public function new(
        Request $request,
        CandidateRepository $candidateRepository,
    ): Response {
        $userConnected = $this->container->get('security.token_storage')->getToken()->getUser();
        if ($userConnected->getInformation() != null) {
            return $this->redirectToRoute('app_candidate_show', [], Response::HTTP_SEE_OTHER);
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
                $noContractSearched = 'Veuillez renseigner au moins un type de contrat recherché.';
                return $this->renderForm('candidate/new.html.twig', [
                    'candidate' => $candidate,
                    'form' => $form,
                    'noContractSearched' => $noContractSearched,
                ]);
            }
            $candidateRepository->save($candidate, true);

            $session = $request->getSession();
            if ($session->get('apply') != null) {
                if ($candidate->getCurriculumVitae()) {
                    $this->addFlash(
                        'success',
                        "Votre profil est maintenant complet, vous pouvez postuler à cette offre."
                    );
                    return $this->redirect($session->get('apply'));
                } else {
                    $this->addFlash('danger', "Veuillez renseigner un CV pour postuler à une offre.");
                    return $this->redirectToRoute('app_candidate_update', [], Response::HTTP_SEE_OTHER);
                }
            } else {
                $this->addFlash('success', "Votre profil a bien été créé.");
                return $this->redirectToRoute('app_candidate_show', [], Response::HTTP_SEE_OTHER);
            }
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
    #[IsGranted('ROLE_EDITOR')]
    public function showCandidateAdmin(Candidate $candidate): Response
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if (in_array('ROLE_RECRUITER', $user->getRoles())) {
            $candidateCandidacies = $candidate->getCandidacies();
            $access = false;
            foreach ($candidateCandidacies as $candidateCandidacy) {
                if ($user->getRecruiter()->getOffers()->contains($candidateCandidacy->getOffer())) {
                    $access = true;
                }
            }
            if ($access == false) {
                return $this->redirectToRoute('app_candidacy_recruiter_index', [], Response::HTTP_SEE_OTHER);
            }
        }
        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_candidate_admin_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(
        Request $request,
        Candidate $candidate,
        CandidateRepository $candidateRepository
    ): Response {
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
                return $this->renderForm('candidate/update.html.twig', [
                    'candidate' => $candidate,
                    'form' => $form,
                    'noContractSearched' => $noContractSearched,
                ]);
            }
            $candidate->setUpdatedAt(new DateTime());
            $candidateRepository->save($candidate, true);

            return $this->redirectToRoute('app_candidate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('candidate/update.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/new', name: 'app_candidate_admin_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function newCandidateAdmin(
        Request $request,
        CandidateRepository $candidateRepository,
        int $id,
        UserRepository $userRepository,
    ): Response {
        $candidate = new Candidate();
        $candidate->setUser($userRepository->findOneById($id));
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidateRepository->save($candidate, true);

            return $this->redirectToRoute('app_candidate_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/mypage/update', name: 'app_candidate_update', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_CANDIDATE')]
    public function update(
        Request $request,
        CandidateRepository $candidateRepository,
    ): Response {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $candidateId = $user->getInformation()->getId();
        $candidate = $candidateRepository->findOneBy(['id' => $candidateId]);
        $candidate->setUser($user);
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);
        $session = $request->getSession();

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
                return $this->renderForm('candidate/update.html.twig', [
                    'candidate' => $candidate,
                    'form' => $form,
                    'noContractSearched' => $noContractSearched,
                ]);
            }
            $candidate->setUpdatedAt(new DateTime());
            $candidateRepository->save($candidate, true);
            $session = $request->getSession();
            if ($session->get('apply') != null) {
                if ($candidate->getCurriculumVitae()) {
                    $this->addFlash(
                        'success',
                        "Votre profil est maintenant complet, vous pouvez postuler à cette offre."
                    );
                    return $this->redirect($session->get('apply'));
                } else {
                    $this->addFlash('danger', "Veuillez renseigner un CV pour postuler à une offre.");
                    return $this->redirectToRoute('app_candidate_update', [], Response::HTTP_SEE_OTHER);
                }
            } else {
                $this->addFlash('success', "Votre profil a bien été mis à jour.");
                return $this->redirectToRoute('app_candidate_show', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->renderForm('candidate/update.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/cv/delete/{candidateId}', name: 'app_candidate_cv_delete', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_READER')]
    public function deleteCV(
        Request $request,
        CandidateRepository $candidateRepository,
        int $candidateId
    ): Response {

        $candidate = $candidateRepository->findOneBy(['id' => $candidateId]);

        $path = __DIR__ . '/../../public/uploads/candidate/curriculumVitae/';
        unlink($path . $candidate->getCurriculumVitae());
        $candidate->setCurriculumVitae('');

        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        $candidateRepository->save($candidate, true);
        $this->addFlash('success', "Votre CV a bien été supprimé.");

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->redirectToRoute(
                'app_candidate_admin_edit',
                [
                    'candidate' => $candidate,
                    'form' => $form,
                    'id' => $candidateId
                ],
                Response::HTTP_SEE_OTHER
            );
        } else {
            return $this->redirectToRoute(
                'app_candidate_update',
                [
                    'candidate' => $candidate,
                    'form' => $form,
                ],
                Response::HTTP_SEE_OTHER
            );
        }
    }

    #[Route('/picture/delete/{candidateId}', name: 'app_candidate_picture_delete', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_READER')]
    public function deletePicture(
        Request $request,
        CandidateRepository $candidateRepository,
        int $candidateId
    ): Response {

        $candidate = $candidateRepository->findOneBy(['id' => $candidateId]);

        $path = __DIR__ . '/../../public/uploads/candidate/picture/';
        unlink($path . $candidate->getPicture());
        $candidate->setPicture('');

        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        $candidateRepository->save($candidate, true);
        $this->addFlash('success', "Votre photo a bien été supprimée.");

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->redirectToRoute(
                'app_candidate_admin_edit',
                [
                    'candidate' => $candidate,
                    'form' => $form,
                    'id' => $candidateId
                ],
                Response::HTTP_SEE_OTHER
            );
        } else {
            return $this->redirectToRoute(
                'app_candidate_update',
                [
                    'candidate' => $candidate,
                    'form' => $form,
                ],
                Response::HTTP_SEE_OTHER
            );
        }
    }
}
