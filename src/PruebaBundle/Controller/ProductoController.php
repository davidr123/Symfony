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
use PruebaBundle\Form\ProductosType;
use PruebaBundle\Form\Ficha_TecnicaType;

class ProductoController extends Controller
{
   
    
    public function allAction()
    {
        $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $productos=$repository->findAll();
        return $this->render('@Prueba/Productos/index.html.twig', array('productos'=>$productos));
    }
    
     public function dibujarFormFichaAction(Request $request)
    {

         
  
 
          $form = $this->createForm(Ficha_TecnicaType::class);
        
   
    
    return $this->render('@Prueba/Productos/ingresoprod.html.twig', ["form" => $form->createView()]);
}

     public function dibujarFormProductoAction(Request $request)
    {
       $producto = new Productos();
         
  
 
        $form = $this->createForm(ProductosType::class, $producto);
        $form->handleRequest($request);
 
    if ($form->isSubmitted() && $form->isValid())
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($producto);
        $em->flush();
        return $this->redirectToRoute('mensaje');
    }
   
    
    return $this->render('@Prueba/Productos/ingresoprod.html.twig', ["form" => $form->createView()]);
}
    
    
       public function mensajeAction()
    {
          
       
    
      return $this->render('@Prueba/Productos/mensaje.html.twig');
     
     }
    
     
       public function modcrearProductoAction()
    {
          
       
    
      return $this->render('@Prueba/Productos/mensaje.html.twig');
     
     }
    
        public function buscarProductoAction(Request $request)
    {   
        $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $var=$request->request->get("nombrevul");
        if($var==""){
        $var=$request->request->get("nombrecien");
        $producto = $repository->findBy(
         array('nombrecientifico' => $var)
          );
        }else{
        $producto = $repository->findBy(
         array('nombrevulgar' => $var)
         );
        }
        return $this->render('@Prueba/Productos/index.html.twig', array('productos'=>$producto));
      
     
     }
     public function fichaProductoAction(Request $request)
    {   
         $var=$request->request->get("id");
         $repository=$this->getDoctrine()->getRepository('PruebaBundle:Ficha_Tecnica');
         $ficha = $repository->findBy(
         array('producto' => $var)
          );
        return $this->render('@Prueba/Productos/fichatecnica.html.twig', array('fichas'=>$ficha));
      
     
     }
    
    
}
  
