<?php

namespace App\Form;

use App\Entity\Notation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('greenCross')
            ->add('blackCross')
            ->add('belt')
            ->add('noCrossWeeks')
            ->add('job')
            ->add('checked')
            ->add('user_id')
            ->add('user')
            ->add('weeks')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Notation::class,
        ]);
    }
}
