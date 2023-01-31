<?php

namespace App\Form;

use App\Entity\Offer;
use App\Entity\Stack;
use App\Entity\Partner;
use App\Entity\Contract;
use App\Entity\Recruiter;
use App\Entity\WorkField;
use App\Form\OfferRecruiterType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OfferType extends OfferRecruiterType
{
    private function addPartnerField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('partner', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'class' => Partner::class,
                'choice_label' => 'name',
                'choice_value' => 'id',
                'label' => 'Entreprise',
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'Ex : Externatic',
            ]);
    }

    private function addRecruiterField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('recruiter', EntityType::class, [
                'required' => true,
                'class' => Recruiter::class,
                'choice_label' => 'fullname',
                'placeholder' => 'Ex : John Doe',
                'label' => 'Recruteur',
                'multiple' => false,
                'expanded' => false,
            ]);
    }

    private function addStatusSelection(FormBuilderInterface $builder): void
    {
        $builder
            ->add('open', ChoiceType::class, [
                'choices' => [
                    "En cours" => true,
                    "Inactive" => false
                ],
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Statut de l\'offre',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addStatusSelection($builder);
        $this->addPartnerField($builder);
        $this->addRecruiterField($builder);
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
