<?php

namespace App\Form;

use App\Entity\Proyecto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use App\Entity\Osc;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProyectoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('tematica', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('presupuesto_total', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('gastos', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('inversiones', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('osc', EntityType::class, [
            'class' => 'App\Entity\Osc',
            'placeholder' => 'Seleccione una OSC',
             'attr' => ['class' => 'form-control ']   
        ])             
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Proyecto::class,
        ]);
    }
}
