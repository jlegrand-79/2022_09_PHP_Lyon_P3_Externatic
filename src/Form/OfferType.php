<?php

namespace App\Form;

use App\Entity\Offer;
use App\Entity\Stack;
use App\Entity\Partner;
use App\Entity\Contract;
use App\Entity\Recruiter;
use App\Entity\WorkField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('partner', EntityType::class, [
                'required' => true,
                'mapped' => false,
                'class' => Partner::class,
                'choice_label' => 'name',
                'choice_value' => 'id',
                'label' => 'Entreprise',
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'Ex : Externatic',
            ])

            ->add('recruiter', EntityType::class, [
                'required' => true,
                'class' => Recruiter::class,
                'choice_label' => 'fullname',
                'placeholder' => 'Ex : John Doe',
                'label' => 'Recruteur',
                'multiple' => false,
                'expanded' => false,
            ])

            ->add('title', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Développeur web full stack',
                ],
                'label' => 'Titre de l\'offre',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])

            ->add('address', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 1 rue Racine 44000 Nantes',
                ],
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])

            ->add('contract', EntityType::class, [
                'required' => true,
                'placeholder' => 'Ex : CDI',
                'class' => Contract::class,
                'choice_label' => 'type',
                'label' => 'Type de contrat',
                'multiple' => false,
                'expanded' => false,
            ])

            ->add('work_field', EntityType::class, [
                'required' => true,
                'placeholder' => 'Ex : Développement',
                'label' => 'Domaine de compétences',
                'class' => WorkField::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])

            ->add('stack', EntityType::class, [
                'required' => true,
                'class' => Stack::class,
                'choice_label' => 'name',
                'label' => 'Technologies utilisées',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
