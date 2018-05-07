<?php

namespace PruebaBundle\Controller;

use PruebaBundle\Entity\Ficha_Tecnica;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ficha_tecnica controller.
 *
 */
class Ficha_TecnicaController extends Controller
{
    /**
     * Lists all ficha_Tecnica entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ficha_Tecnicas = $em->getRepository('PruebaBundle:Ficha_Tecnica')->findAll();

        return $this->render('ficha_tecnica/index.html.twig', array(
            'ficha_Tecnicas' => $ficha_Tecnicas,
        ));
    }

    /**
     * Creates a new ficha_Tecnica entity.
     *
     */
    public function newAction(Request $request)
    {
        $ficha_Tecnica = new Ficha_tecnica();
        $form = $this->createForm('PruebaBundle\Form\Ficha_TecnicaType', $ficha_Tecnica);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficha_Tecnica);
            $em->flush();

            return $this->redirectToRoute('admin_ficha_show', array('id' => $ficha_Tecnica->getId()));
        }

        return $this->render('ficha_tecnica/new.html.twig', array(
            'ficha_Tecnica' => $ficha_Tecnica,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ficha_Tecnica entity.
     *
     */
    public function showAction(Ficha_Tecnica $ficha_Tecnica)
    {
        $deleteForm = $this->createDeleteForm($ficha_Tecnica);
        $var=$ficha_Tecnica->getProductos()->getId();
         $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
         $produ=$repository->findBy(
         array('id' => $var)
          );

        return $this->render('ficha_tecnica/show.html.twig', array(
            'ficha_Tecnica' => $ficha_Tecnica,
            'producto'=> $produ,
            'delete_form' => $deleteForm->createView(),
            
        ));
    }

    /**
     * Displays a form to edit an existing ficha_Tecnica entity.
     *
     */
    public function editAction(Request $request, Ficha_Tecnica $ficha_Tecnica)
    {
        $deleteForm = $this->createDeleteForm($ficha_Tecnica);
        $editForm = $this->createForm('PruebaBundle\Form\Ficha_TecnicaType', $ficha_Tecnica);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_ficha_edit', array('id' => $ficha_Tecnica->getId()));
        }

        return $this->render('ficha_tecnica/edit.html.twig', array(
            'ficha_Tecnica' => $ficha_Tecnica,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ficha_Tecnica entity.
     *
     */
    public function deleteAction(Request $request, Ficha_Tecnica $ficha_Tecnica)
    {
        $form = $this->createDeleteForm($ficha_Tecnica);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ficha_Tecnica);
            $em->flush();
        }

        return $this->redirectToRoute('admin_ficha_index');
    }

    /**
     * Creates a form to delete a ficha_Tecnica entity.
     *
     * @param Ficha_Tecnica $ficha_Tecnica The ficha_Tecnica entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ficha_Tecnica $ficha_Tecnica)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_ficha_delete', array('id' => $ficha_Tecnica->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
