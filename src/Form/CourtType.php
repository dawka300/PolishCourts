<?php

namespace App\Form;

use App\Entity\Court;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('court_name')
            ->add('court_code')
            ->add('appeal')
            ->add('circuit')
            ->add('information')
            ->add('contentChanged')
            ->add('contentChangedBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Court::class,
        ]);
    }
}
