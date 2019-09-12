<?php

namespace App\Form;

use App\Entity\DocumentosVerificacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Actividades;


class DocumentosVerificacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lista_asistencia_url', FileType::class, [
                'label' => 'Lista Asistencia',
				'mapped' => false,
                'attr' => array(
                        'accept' => "image/jpeg, image/png"
                    ),
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' =>'Please upload a JPG or PNG',
                    ])
                ],
            ])



            ->add('material_entregado_url', FileType::class, [
                'label' => 'Material Entregado',
				'mapped' => false,
                'attr' => array(
                        'accept' => "image/jpeg, image/png"
                    ),
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' =>'Please upload a JPG or PNG',
                    ])
                ],
            ])


            ->add('foto_url', FileType::class, [
                'label' => 'Foto',
				'mapped' => false,
                'attr' => array(
                        'accept' => "image/jpeg, image/png"
                    ),
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' =>'Porfafor suba un archivo JPG o PNG',
                    ])
                ],
            ])
            ->add('actividades', EntityType::class, [
            'class' => 'App\Entity\Actividades',
            'placeholder' => 'Seleccione una actividad',
             'attr' => ['class' => 'form-control ']   
        ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentosVerificacion::class,
        ]);
    }
}
