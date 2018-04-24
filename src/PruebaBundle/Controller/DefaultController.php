<?php

namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('@Prueba/Default/index.html.twig');
    }
  
    public function secondAction()
    {
         $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $productos=$repository->findAll();
        return $this->render('@Prueba/Productos/index.html.twig', array('productos'=>$productos));
    }
    public function contactosAction()
    {
        return $this->render('@Prueba/Default/contactos.html.twig');
    }
    public function loginAction()
    {
        return $this->render('@Prueba/Default/login.html.twig');
    }
    
    public function registroAction()
    {
        return $this->render('@Prueba/Default/registro.html.twig');
    }
    
    
     public function registroAdminAction()
    {
        return $this->render('@Prueba/Default/administrador.html.twig');
    }
   
    
}
