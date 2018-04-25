<?php

namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use PruebaBundle\Form\UserType;
use PruebaBundle\Entity\User;


class UserController extends Controller
{
    
 public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() || $form->isValid()) {

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
           

        return $this->render('@Prueba/Default/register.html.twig', ["form" => $form->createView()]);
    }
    
    
}
