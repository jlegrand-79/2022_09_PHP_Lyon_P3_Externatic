<?php

namespace App\Form;

use App\Entity\Offer;
use App\Entity\Stack;
use App\Entity\Partner;
use App\Entity\Contract;
use App\Entity\Recruiter;
use App\Entity\WorkField;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OfferRecruiterType extends AbstractType
{
    private function addTitleField(FormBuilderInterface $builder): void
    {
        $builder
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
            ]);
    }

    private function addAddressField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('address', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 1 rue Racine',
                ],
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addAddressComplementField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('addressComplement', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 2ème étage - Appt 130',
                ],
                'label' => 'Complément d\'adresse',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPostalCodeField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('postalCode', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 01000',
                ],
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addCityField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('city', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Bourg-en-Bresse',
                ],
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addContractField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('contract', EntityType::class, [
                'required' => true,
                'placeholder' => 'Ex : CDI',
                'class' => Contract::class,
                'choice_label' => 'type',
                'label' => 'Type de contrat',
                'multiple' => false,
                'expanded' => false,
            ]);
    }

    private function addWorkFieldField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('workField', EntityType::class, [
                'required' => true,
                'placeholder' => 'Ex : Développement',
                'label' => 'Domaine de compétences',
                'class' => WorkField::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ]);
    }

    private function addStackField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('stack', EntityType::class, [
                'required' => true,
                'class' => Stack::class,
                'choice_label' => 'name',
                'label' => 'Technologie(s) utilisée(s)',
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    private function addDescriptionField(FormBuilderInterface $builder): void
    {
        $builder
            ->add('description', CKEditorType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Rejoignez une équipe à la pointe de l\'innovation...',
                ],
                'label' => 'Détail de l\'offre',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addTitleField($builder);
        $this->addAddressField($builder);
        $this->addAddressComplementField($builder);
        $this->addPostalCodeField($builder);
        $this->addCityField($builder);
        $this->addContractField($builder);
        $this->addWorkFieldField($builder);
        $this->addStackField($builder);
        $this->addDescriptionField($builder);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
