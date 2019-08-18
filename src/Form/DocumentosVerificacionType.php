<?php

namespace App\Form;

use App\Entity\DocumentosVerificacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentosVerificacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lista_asistencia_url')
            ->add('material_entregado_url')
            ->add('foto_url')
            ->add('actividades')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentosVerificacion::class,
        ]);
    }
}
