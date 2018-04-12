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
        return $this->render('@Prueba/Default/second.html.twig');
    }
    public function contactosAction()
    {
        return $this->render('@Prueba/Default/contactos.html.twig');
    }
    public function loginAction()
    {
        return $this->render('@Prueba/Default/login.html.twig');
    }
}
