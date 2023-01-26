<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminRegistrationFormType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->feedRegistrationForm($builder);
        $builder
            ->add('roles', ChoiceType::class, [
                'mapped' => false,
                'choices' => array(
                    'Candidat' => 'ROLE_CANDIDATE',
                    'Recruteur' => 'ROLE_RECRUITER',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => 'Rôle',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
