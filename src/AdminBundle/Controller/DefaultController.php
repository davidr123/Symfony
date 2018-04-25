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
     public function loginAction(Request $request)
    {
     
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
