<?php

namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PruebaBundle\Entity\Productos;
use PruebaBundle\Entity\Ficha_Tecnica;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PruebaBundle\Form\Product;

class ProductoController extends Controller
{
public $bandera=false;    
    
    public function allAction()
    {
        $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $productos=$repository->findAll();
        return $this->render('@Prueba/Productos/index.html.twig', array('productos'=>$productos));
    }
     public function dibujarFormProductoAction(Request $request)
    {
       $producto = new Productos();
         
  
 
    $form = $this->createForm(\PruebaBundle\Form\Product::class, $producto);
 
    $form->handleRequest($request);
 
    if ($form->isSubmitted() && $form->isValid())
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($producto);
        $em->flush();
        return $this->redirectToRoute('modeloingresoprod');
    }
    return $this->render('@Prueba/Productos/ingresoprod.html.twig', ["form" => $form->createView()]);
}
     
       public function modcrearProductoAction()
    {
          
       
    
      return $this->render('@Prueba/Productos/mensaje.html.twig');
     
     }
    
}
  
