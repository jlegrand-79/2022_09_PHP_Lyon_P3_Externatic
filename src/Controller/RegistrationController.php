<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AdminRegistrationFormType;
use App\Form\RegistrationFormType;
use App\Service\PasswordChecker;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        PasswordChecker $passwordChecker
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // vérification de password via un service ici
            $enteredPassword = $form->get('plainPassword')->getData();
            $enteredPassword2 = $form->get('plainPassword2')->getData();
            $errors = $passwordChecker->checkPassword($enteredPassword, $enteredPassword2);

            if ($errors != []) {
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form->createView(),
                    'errors' => $errors,
                ]);
            }

            $user->setRoles(['ROLE_CANDIDATE']);

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            $this->addFlash('success', "Votre compte a bien été créé. Vous pouvez maintenant vous connecter.");

            return $this->redirectToRoute('app_login');
        }
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    #[Route('/admin/register', name: 'app_admin_register')]
    public function adminRegister(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        PasswordChecker $passwordChecker
    ): Response {
        $user = new User();
        $form = $this->createForm(AdminRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // vérification de password via un service ici
            $enteredPassword = $form->get('plainPassword')->getData();
            $enteredPassword2 = $form->get('plainPassword2')->getData();
            $errors = $passwordChecker->checkPassword($enteredPassword, $enteredPassword2);

            if ($errors != []) {
                return $this->render('registration/register_admin.html.twig', [
                    'registrationForm' => $form->createView(),
                    'errors' => $errors,
                ]);
            }

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $role = $form->get('roles')->getData();
            $user->setRoles([$role]);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            $this->addFlash('success', "Le compte utilisateur a bien été créé.");

            return $this->redirectToRoute('app_admin_register');
        }
        return $this->render('registration/register_admin.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
