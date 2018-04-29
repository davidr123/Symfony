<?php

namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PruebaBundle\Entity\Usuarios;
use PruebaBundle\Form\UsuariosType;



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
    
    public function registroAction(Request $request)
    {
        $user = new Usuarios();
         $user->setRole("ROLE_VISITANTE");
        $form = $this->createForm(UsuariosType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() || $form->isValid()) {
            $user->setRole("ROLE_VISITANTE");
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('mensaje');
        }
           

        return $this->render('@Prueba/Default/registro.html.twig', ["form" => $form->createView()]);
    }
    
        
    
    

     public function registroAdminAction()
    {
        return $this->render('@Prueba/Default/administrador.html.twig');
    }
   
    
}
