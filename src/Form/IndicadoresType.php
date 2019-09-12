<?php

namespace App\Form;

use App\Entity\Indicadores;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\Resultados;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class IndicadoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('detalle', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('meta', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('resultados', EntityType::class, [
            'class' => 'App\Entity\Resultados',
             'attr' => ['class' => 'form-control ']   
        ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Indicadores::class,
        ]);
    }
}
