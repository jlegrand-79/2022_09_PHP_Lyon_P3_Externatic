<?php

namespace App\Form;

use App\Entity\Stack;
use App\Entity\Contract;
use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;

class ProfileType extends AbstractType
{
    public function addPictureFile(FormBuilderInterface $builder): void
    {
        $builder
            ->add('pictureFile', VichFileType::class, [
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner un fichier image valide !',
                    ])
                ],
                'required'      => false,
                'allow_delete'  => false,
                'download_uri' => false,
                'label' => 'Photo',
                'label_attr' => [
                    'class' => 'fs-5'
                ],
            ]);
    }

    public function addGender(FormBuilderInterface $builder): void
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'required' => true,
                'choices'  => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                    'Autre' => 'Autre',
                    'Ne se prononce pas' => 'Ne se prononce pas',
                ],
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'placeholder' => 'Ex : Homme'
            ]);
    }

    public function addFullName(FormBuilderInterface $builder): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Charles',
                ],
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('lastname', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Xavier',
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    public function addBirthday(FormBuilderInterface $builder): void
    {
        $builder
            ->add('birthday', DateType::class, [
                'widget' => 'choice',
                'format' => 'dd MMMM yyyy',
                'years' => range(date('Y') - 16, date('Y') - 70),
                'label' => 'Anniversaire',
                'label_attr' => [
                    'class' => 'fs-5'
                ],
                'placeholder' => [
                    'year' => 'Ex: 1982', 'month' => 'Ex: octobre', 'day' => 'Ex : 03',
                ],
            ]);
    }

    public function addContactDetails(FormBuilderInterface $builder): void
    {
        $builder
            ->add('phone', TelType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 0285522633',
                ],
                'label' => 'Téléphone',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('address', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 1 rue de l\'institut Xavier',
                ],
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('addressComplement', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Batiment principal',
                ],
                'label' => 'Complément d\'adresse',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('postalCode', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 44000',
                ],
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Nantes',
                ],
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    public function addSearchCriteria(FormBuilderInterface $builder): void
    {
        $builder
            ->add('contractSearched', EntityType::class, [
                'required' => true,
                'placeholder' => 'Ex : CDI',
                'class' => Contract::class,
                'choice_label' => 'type',
                'label' => 'Type(s) de contrat recherché',
                'label_attr' => [
                    'class' => 'fs-5'
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('stacks', EntityType::class, [
                'required' => true,
                'class' => Stack::class,
                'choice_label' => 'name',
                'label' => 'Technologie(s) utilisée(s)',
                'label_attr' => [
                    'class' => 'fs-5'
                ],
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function addCvFile(FormBuilderInterface $builder): void
    {
        $builder
            ->add('cvFile', VichFileType::class, [
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner un fichier PDF valide !',
                    ])
                ],
                'required' => false,
                'allow_delete'  => false,
                'download_uri' => false,
                'label' => 'Curriculum Vitæ',
                'label_attr' => [
                    'class' => 'fs-5 label-file'
                ],
                'attr' => [
                    'id' => 'cv',
                    'class' => 'text-start',
                ],
            ]);
    }

    public function addPartner(FormBuilderInterface $builder): void
    {
        $builder
            ->add('partner', EntityType::class, [
                'required' => false,
                'class' => Partner::class,
                'choice_label' => 'name',
                'choice_value' => 'id',
                'label' => 'Entreprise',
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'Ex : Externatic',
            ]);
    }

    public function addPosition(FormBuilderInterface $builder): void
    {
        $builder
            ->add('position', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Architecte technique',
                ],
                'label' => 'Fonction occupée',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }
}
