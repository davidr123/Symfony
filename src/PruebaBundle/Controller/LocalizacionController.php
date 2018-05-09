<?php

namespace PruebaBundle\Controller;

use PruebaBundle\Entity\Localizacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Localizacion controller.
 *
 */
class LocalizacionController extends Controller
{
    /**
     * Lists all localizacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localizacions = $em->getRepository('PruebaBundle:Localizacion')->findAll();

        return $this->render('localizacion/index.html.twig', array(
            'localizacions' => $localizacions,
        ));
    }

    /**
     * Creates a new localizacion entity.
     *
     */
    public function newAction(Request $request)
    {
        $localizacion = new Localizacion();
        $form = $this->createForm('PruebaBundle\Form\LocalizacionType', $localizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localizacion);
            $em->flush();

            return $this->redirectToRoute('admin_localizacion_show', array('id' => $localizacion->getId()));
        }

        return $this->render('localizacion/new.html.twig', array(
            'localizacion' => $localizacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a localizacion entity.
     *
     */
    public function showAction(Localizacion $localizacion)
    {
        $deleteForm = $this->createDeleteForm($localizacion);
        
        return $this->render('localizacion/show.html.twig', array(
            'localizacion' => $localizacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localizacion entity.
     *
     */
    public function editAction(Request $request, Localizacion $localizacion)
    {
        $deleteForm = $this->createDeleteForm($localizacion);
        $editForm = $this->createForm('PruebaBundle\Form\LocalizacionType', $localizacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_localizacion_edit', array('id' => $localizacion->getId()));
        }

        return $this->render('localizacion/edit.html.twig', array(
            'localizacion' => $localizacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a localizacion entity.
     *
     */
    public function deleteAction(Request $request, Localizacion $localizacion)
    {
        $form = $this->createDeleteForm($localizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localizacion);
            $em->flush();
        }

        return $this->redirectToRoute('admin_localizacion_index');
    }

    /**
     * Creates a form to delete a localizacion entity.
     *
     * @param Localizacion $localizacion The localizacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localizacion $localizacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_localizacion_delete', array('id' => $localizacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
