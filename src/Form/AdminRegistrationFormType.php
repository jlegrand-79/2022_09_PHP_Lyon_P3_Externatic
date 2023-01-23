<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AdminRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'recruteur@mailrecruteur.com',
                    'class' => 'inputLoginForm p-1 mb-3'
                ],
                'label' => 'Mail',
                'label_attr' => [
                    'class' => 'm-0'
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'inputLoginForm p-1 mb-3'
                ],
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'm-0 pt-2'
                ],
                'constraints' => [
                    new Length([
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('plainPassword2', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'inputLoginForm p-1 mb-3'
                ],
                'label' => 'Confirmez le mot de passe',
                'label_attr' => [
                    'class' => 'm-0 pt-2'
                ],
                'constraints' => [
                    new Length([
                        'max' => 4096,
                    ]),
                ],
            ])

            ->add('roles', ChoiceType::class, [
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'mapped' => false,
                'choices'  => [
                    'Candidat' => 'ROLE_CANDIDATE',
                    'Recruteur' => 'ROLE_RECRUITER',
                ],
                'attr' => [
                    'class' => 'inputLoginForm p-1 mb-3'
                ],
                'label' => "Rôle de l'utilisateur",
                'label_attr' => [
                    'class' => 'm-0 pt-2'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
