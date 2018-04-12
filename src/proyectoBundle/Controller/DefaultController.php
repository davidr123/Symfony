<?php

namespace proyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('proyectoBundle:Default:index.html.twig');
    }
}
