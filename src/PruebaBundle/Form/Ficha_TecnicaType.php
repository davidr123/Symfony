<?php

namespace PruebaBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType ;
class Ficha_TecnicaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nutritivo')->add('valor100gr')->add('metodo')->add('productos', EntityType::class, array(
        'class' => 'PruebaBundle:Productos',
        'choice_label'=> 'nombrevulgar'
        
        ))->add('guardar', SubmitType::class, array('label'=> 'Crear Productos'));
   
        
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PruebaBundle\Entity\Ficha_Tecnica'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pruebabundle_ficha_tecnica';
    }


}
