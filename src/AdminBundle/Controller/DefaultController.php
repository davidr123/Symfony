<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use PruebaBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Admin/Default/index.html.twig');
      
    }
     public function leerproduAction()
    {
          $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $productos=$repository->findAll();
        return $this->render('@Admin/Default/listadoproductos.html.twig',array('productos'=>$productos));
      
    }
    
    
    
      public function leerusuarioAction()
    {
          $repository=$this->getDoctrine()->getRepository('PruebaBundle:usuarios');
        $usuarios=$repository->findAll();
        return $this->render('@Admin/Default/listausuarios.html.twig',array('productos'=>$usuarios));
      
    }
    
        public function leerfichaAction()
    {
          $repository=$this->getDoctrine()->getRepository('PruebaBundle:Ficha_Tecnica');
        $usuarios=$repository->findAll();
        return $this->render('@Admin/Default/listatablafichatecnica.html.twig',array('productos'=>$usuarios));
      
    }
    
    
    
     public function loginAction(Request $request)
    {
      $u=$this->getUser();
    if($u!=null){
        $role=$u->getRole();
        if($role=='ROLE_VISITANTE'){
            return $this->redirectToRoute('prueba_home');
        }
    }

    $authenticationUtils= $this->get('security.authentication_utils');     
             // get the login error if thtilsere is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    
    return $this->render('@Admin/Default/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
       
    ));
        
    }
}
