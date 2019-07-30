<?php

namespace App\Form;

use App\Entity\CargosProyecto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Form\DataTransformer\IssueToNumberTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CargosType;
use App\Entity\Cargos;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CargosProyectoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        
        
        $builder
            ->add('nombre', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('telefono', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('email', TextType::class, [
            'attr' => ['class' => 'form-control ']
        ])
            ->add('proyecto', EntityType::class, [
            'class' => 'App\Entity\Proyecto',
            'placeholder' => 'Seleccione un proyecto',
             'attr' => ['class' => 'form-control ']   
        ])       
            ->add('cargo', EntityType::class, [
            'class' => 'App\Entity\Cargos',
            'placeholder' => 'Seleccione un cargo',
             'attr' => ['class' => 'form-control ']   
        ])                
        ;
        
      
        
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CargosProyecto::class,
        ]);
    }
}
