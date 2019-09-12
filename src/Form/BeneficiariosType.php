<?php

namespace App\Form;

use App\Entity\Beneficiarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Actividades;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BeneficiariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identificacion', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('nombres', TextType::class, [
            'attr' => ['class' => 'form-control col-xs-6 ']
        ])
            ->add('apellidos', TextType::class, [
            'attr' => ['class' => 'form-control col-xs-6']
        ])
            ->add('genero', ChoiceType::class, [
            'attr' => ['class' => 'form-control '] ,
			'choices'  => [
				'Masculino' => 'Masculino',
				'Femenino' => 'Femenino'
			],
		])
            ->add('correo', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('edad',TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('discapacitado')
            ->add('actividades', EntityType::class, [
            'class' => 'App\Entity\Actividades',
             'attr' => ['class' => 'form-control ']   
        ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Beneficiarios::class,
        ]);
    }
}
