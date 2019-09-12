<?php

namespace App\Form;

use App\Entity\Actividades;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Indicadores;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ActividadesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('fecha_inicio', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('fecha_final', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('identificacion_docente', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('nombres_apellidos_docente', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('presupuesto_proyectado', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('presupuesto_ejecutado', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('presupuesto_avance', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('meta', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('avances', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('estado', ChoiceType::class, [
            'attr' => ['class' => 'form-control '] ,
			'choices'  => [
				'Rojo' => 'Fecha ya paso',
				'Amarillo' => 'En ejecucion',
				'Verde' => 'Finalizado',
			],
		])
            ->add('indicadores', EntityType::class, [
            'class' => 'App\Entity\Indicadores',
             'attr' => ['class' => 'form-control ']   
        ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actividades::class,
        ]);
    }
}
