<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends ProfileType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addPictureFile($builder);
        $this->addGender($builder);
        $this->addFullName($builder);
        $this->addBirthday($builder);
        $this->addContactDetails($builder);
        $this->addSearchCriteria($builder);
        $this->addCvFile($builder);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
