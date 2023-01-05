<?php

namespace App\Form;

use App\Entity\Stack;
use App\Entity\Contract;
use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CandidateType extends AbstractType
{
    private function buildPersonalInformation(FormBuilderInterface $builder): void
    {
        $builder
            ->add('pictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true,
                'download_uri' => false,
                'label' => 'Photo',
                'label_attr' => [
                    'class' => 'fs-5'
                ],
            ])

            ->add('gender', ChoiceType::class, [
                'required' => true,
                'choices'  => [
                    'Homme' => 'man',
                    'Femme' => 'woman',
                    'Autre' => 'other',
                    'Ne se prononce pas' => 'none',
                ],
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'placeholder' => 'Ex : Homme'
            ])

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
            ])

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

    private function buildContactInformation(FormBuilderInterface $builder): void
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
            ],
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

    private function buildProfessionalInformation(FormBuilderInterface $builder): void
    {
        $builder
            ->add('contractSearched', EntityType::class, [
                'required' => true,
                'placeholder' => 'Ex : CDI',
                'class' => Contract::class,
                'choice_label' => 'type',
                'label' => 'Type de contrat recherché',
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
                'label' => 'Technologies utilisées',
                'label_attr' => [
                    'class' => 'fs-5'
                ],
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'allow_delete'  => true,
                'download_uri' => true,
                'label' => 'Téléverser votre CV',
                'label_attr' => [
                    'class' => 'fs-5 label-file'
                ],
                'attr' => ['id' => 'cv', 'class' => 'text-center'],
            ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->buildPersonalInformation($builder);
        $this->buildContactInformation($builder);
        $this->buildProfessionalInformation($builder);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
