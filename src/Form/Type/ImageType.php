<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Nombre de imagen",
                "required" => true,
                'attr' => [
                    'class' => 'form-control tooltipjs tooltipstered mt-2 mb-2',
                    'title' => "Falta el nombre",
                    'placeholder' => 'Nombre de imagen',
                ]
            ])
            ->add('file', FileType::class, [
                'data_class' => null,
                "label" => "Imagen",
                "required" => true,
                'attr' => [
                    'class' => 'form-control tooltipjs tooltipstered mt-2 mb-2', 
                    'title' => "Falta la imagen (jpg, jpeg, png, giff)"
                ]
            ])
            ->add('Guardar', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary  mt-3 mb-5', 
                ]
            ])

        ;
    }
}