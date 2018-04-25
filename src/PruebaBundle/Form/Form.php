<?php
 
namespace PruebaBundle\Form; 
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 
class ProductoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title")
            ->add("body")
            ->add('productos', EntityType::class, array(
                'class' => 'PruebaBundle:Ficha_tencnica',
                'choice_label' => 'nutritivo',
                'multiple' => TRUE
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Post'));
    }
 
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PruebaBundle\Entity\Productos',
        ));
    }
}