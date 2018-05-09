<?php

namespace PruebaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType ;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\FileType;


class ProductosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombrevulgar')->add('nombrecientifico')->add('nombreingles')->add('fuente')->add('imagen', FileType::class, array('data_class' => null),array(
                "label" => "Imagen:",
                "attr" =>array("class" => "form-control")
            ))->add('Localizacion', EntityType::class, array(
        'class' => 'PruebaBundle:Localizacion',
        'choice_label'=> 'pais'
        
        ))->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PruebaBundle\Entity\Productos'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pruebabundle_productos';
    }


}
