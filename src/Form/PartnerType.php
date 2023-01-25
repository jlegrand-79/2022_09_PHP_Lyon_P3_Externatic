<?php

namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PartnerType extends AbstractType
{
    // public function buildForm(FormBuilderInterface $builder, array $options): void
    // {
    //     $builder
    //         ->add('logo')
    //         ->add('name')
    //         ->add('description')
    //         ->add('url')
    //         ->add('picture')
    //         ->add('address')
    //         ->add('address_complement')
    //         ->add('postal_code')
    //         ->add('city');
    // }

    private function addPartnerLogo(FormBuilderInterface $builder): void
    {
        $builder
            ->add('logo', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'URL de votre logo',
                ],
                'label' => "Logo de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerName(FormBuilderInterface $builder): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'URL de votre logo',
                ],
                'label' => "Nom de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerDescription(FormBuilderInterface $builder): void
    {
        $builder
            ->add('description', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'URL de votre logo',
                ],
                'label' => "Description de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerURL(FormBuilderInterface $builder): void
    {
        $builder
            ->add('url', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'URL de votre entreprise',
                ],
                'label' => "URL de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerPicture(FormBuilderInterface $builder): void
    {
        $builder
            ->add('picture', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "URL de l'image de votre entreprise",
                ],
                'label' => "Image de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerAdress(FormBuilderInterface $builder): void
    {
        $builder
            ->add('address', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Ex : Rue des marrons",
                ],
                'label' => "Adresse de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerAdressComplement(FormBuilderInterface $builder): void
    {
        $builder
            ->add('address_complement', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Ex : Entrée B",
                ],
                'label' => "Complément d'adresse de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerPostalCode(FormBuilderInterface $builder): void
    {
        $builder
            ->add('postal_code', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Ex : 34000",
                ],
                'label' => "Code postale de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    private function addPartnerCity(FormBuilderInterface $builder): void
    {
        $builder
            ->add('city', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Ex : Rennes",
                ],
                'label' => "Ville de l'entreprise",
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addPartnerLogo($builder);
        $this->addPartnerName($builder);
        $this->addPartnerDescription($builder);
        $this->addPartnerURL($builder);
        $this->addPartnerPicture($builder);
        $this->addPartnerAdress($builder);
        $this->addPartnerAdressComplement($builder);
        $this->addPartnerPostalCode($builder);
        $this->addPartnerCity($builder);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}
