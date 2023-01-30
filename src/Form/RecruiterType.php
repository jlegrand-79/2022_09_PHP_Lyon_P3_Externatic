<?php

namespace App\Form;

use App\Entity\Recruiter;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecruiterType extends ProfileType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addPartner($builder);
        $this->addFullName($builder);
        $this->addPosition($builder);
        $this->addContactDetails($builder);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recruiter::class,
        ]);
    }
}
