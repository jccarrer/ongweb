<?php

namespace App\Form;

use App\Entity\Actividades;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActividadesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('fecha_inicio')
            ->add('fecha_final')
            ->add('identificacion_docente')
            ->add('nombres_apellidos_docente')
            ->add('presupuesto_proyectado')
            ->add('presupuesto_ejecutado')
            ->add('presupuesto_avance')
            ->add('meta')
            ->add('avances')
            ->add('estado')
            ->add('indicadores')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actividades::class,
        ]);
    }
}
