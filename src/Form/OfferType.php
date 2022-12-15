<?php

namespace App\Form;

use App\Entity\Contract;
use App\Entity\Offer;
use App\Entity\Recruiter;
use App\Entity\Stack;
use App\Entity\WorkField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('recruiter', EntityType::class, [
                'class' => Recruiter::class,
                'choice_label' => 'fullname'
            ])
            ->add('title')
            ->add('description')
            ->add('work_field', EntityType::class, [
                'label' => 'Domaine de compétences',
                'class' => WorkField::class,
                'choice_label' => 'name'
            ])
            ->add('address')
            ->add('publicationDate')
            ->add('contract', EntityType::class, [
                'class' => Contract::class,
                'choice_label' => 'type'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
