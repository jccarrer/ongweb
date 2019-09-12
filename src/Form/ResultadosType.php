<?php

namespace App\Form;

use App\Entity\Resultados;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\Proyecto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ResultadosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('descripcion', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('presupuesto', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('proyecto', EntityType::class, [
            'class' => 'App\Entity\Proyecto',
             'attr' => ['class' => 'form-control ']   
        ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resultados::class,
        ]);
    }
}
