<?php

namespace PruebaBundle\Controller;

use PruebaBundle\Entity\Productos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Producto controller.
 *
 */
class ProductosController extends Controller
{
    /**
     * Lists all producto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('PruebaBundle:Productos')->findAll();

        return $this->render('productos/index.html.twig', array(
            'productos' => $productos,
        ));
    }

    /**
     * Creates a new producto entity.
     *
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm('PruebaBundle\Form\ProductosType', $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('admin_productos_show', array('id' => $producto->getId()));
        }

        return $this->render('productos/new.html.twig', array(
            'producto' => $producto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a producto entity.
     *
     */
    public function showAction(Productos $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);
          $var=$producto->getLocalizacion()->getId();
         $repository=$this->getDoctrine()->getRepository('PruebaBundle:Localizacion');
         $produ=$repository->findBy(
         array('id' => $var)
          );
        return $this->render('productos/show.html.twig', array(
            'producto' => $producto,
            'localizacion'=> $produ,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing producto entity.
     *
     */
    public function editAction(Request $request, Productos $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);
        $editForm = $this->createForm('PruebaBundle\Form\ProductosType', $producto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file=$editForm['imagen']->getData();
 
        // Sacamos la extensión del fichero
        $ext=$file->guessExtension();

        // Le ponemos un nombre al fichero
        $file_name=time().".".$ext;

        // Le ponemos un nombre al fichero
        $file_name=time();

        // Guardamos el fichero en el directorio uploads que estará en el directorio /web del framework

        $file->move("images", $file_name);

        // Establecemos el nombre de fichero en el atributo de la entidad
        $producto->setImagen($file_name);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_productos_edit', array('id' => $producto->getId()));
        }

        return $this->render('productos/edit.html.twig', array(
            'producto' => $producto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a producto entity.
     *
     */
    public function deleteAction(Request $request, Productos $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);
        $borrar= true;
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fichas = $em->getRepository('PruebaBundle:Ficha_Tecnica')->findAll();
            foreach($fichas as $f){
                if($f->getProductos()==$producto){
                    $borrar=false;
                }
            }
            if ($borrar){
            $em->remove($producto);
            $em->flush();
            }
            else{
                return $this->redirectToRoute('mensaje_producto');
            }
        }

        return $this->redirectToRoute('admin_productos_index');
    }

    /**
     * Creates a form to delete a producto entity.
     *
     * @param Productos $producto The producto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Productos $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_productos_delete', array('id' => $producto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
