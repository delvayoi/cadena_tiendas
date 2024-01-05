<?php

namespace App\Form;

use App\Entity\Establecimiento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstablecimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codigo')
            ->add('canttrab')
            ->add('cantprod')
            ->add('directorid')
            ->add('direccionid')
                   ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Establecimiento::class,
        ]);
    }
}
