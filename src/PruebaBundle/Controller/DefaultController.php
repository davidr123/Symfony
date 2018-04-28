<?php

namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PruebaBundle\Entity\Usuarios;
class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('@Prueba/Default/index.html.twig');
    }
    
      public function pruebaAction()
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
     public function loginAction(Request $request)
    {
   
    $authenticationUtils= $this->get('security.authentication_utils');     
             // get the login error if thtilsere is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    
    return $this->render('@Prueba/Default/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
       
    ));
        
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
