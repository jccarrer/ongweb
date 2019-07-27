<?php

namespace App\Form;

use App\Entity\Osc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class OscType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('ciudad')
            ->add('email')
            ->add('telefono')
            ->add('ruc')
            ->add('estatutos')
            ->add('cta_bancaria')
            ->add('ci_representante')
            ->add('ci_uafe')
            ->add('usuario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Osc::class,
        ]);
    }
}
