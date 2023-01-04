<?php

namespace App\Form;

use App\Entity\Stack;
use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true,
                'download_uri' => false,
                'label' => 'Avatar',
                'label_attr' => [
                    'class' => 'form-label'
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
            ])

            ->add('firstname', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Charles',
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
                    'placeholder' => 'Xavier',
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])

            ->add('phone', TelType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '0285522633',
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
                    'placeholder' => '1 rue de l\'institut Xavier',
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
                    'placeholder' => 'Batiment principal',
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
                    'placeholder' => '44000',
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
                    'placeholder' => 'Nantes',
                ],
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])

            ->add('stacks', EntityType::class, [
                'required' => true,
                'class' => Stack::class,
                'choice_label' => 'name',
                'label' => 'Technologies utilisées',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('cvFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true,
                'download_uri' => true,
                'label' => 'Téléverser son CV',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
