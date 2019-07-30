<?php

namespace App\Form;

use App\Entity\Osc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OscType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('direccion', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('ciudad', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('email', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('telefono', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('ruc', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('estatutos', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('cta_bancaria', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('ci_representante', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('ci_uafe', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('user', EntityType::class, [
            'class' => 'App\Entity\User',
            'placeholder' => 'Seleccione un usuario',
             'attr' => ['class' => 'form-control ']   
        ])                
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Osc::class,
        ]);
    }
}
