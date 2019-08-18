<?php

namespace App\Form;

use App\Entity\Beneficiarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BeneficiariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identificacion')
            ->add('nombres')
            ->add('apellidos')
            ->add('genero')
            ->add('correo')
            ->add('edad')
            ->add('discapacitado')
            ->add('actividades')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Beneficiarios::class,
        ]);
    }
}
