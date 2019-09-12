<?php

namespace App\Form;

use App\Entity\Osc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;


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
            ->add('estatutos', FileType::class, [
                'label' => 'estatutos',
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


 //           ->add('estatutos', FileType::class, [
//			'mapped'=>true,
 //           'attr' => ['class' => 'form-control ']
 //       ])



            ->add('cta_bancaria', FileType::class, [
                'label' => 'cta_bancaria',
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



            ->add('ci_representante', FileType::class, [
                'label' => 'cta_bancaria',
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


            ->add('ci_uafe', FileType::class, [
                'label' => 'cta_bancaria',
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
