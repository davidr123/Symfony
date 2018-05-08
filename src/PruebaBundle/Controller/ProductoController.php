<?php

namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PruebaBundle\Entity\Productos;
use PruebaBundle\Entity\Ficha_Tecnica;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use PruebaBundle\Form\ProductosType;
use PruebaBundle\Form\Ficha_TecnicaType;

class ProductoController extends Controller
{
   
    
    public function allAction()
    {
        $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $productos=$repository->findAll();
        return $this->render('@Prueba/Productos/index.html.twig', array('productos'=>$productos));
    }
    
     public function dibujarFormFichaAction(Request $request)
    {
        $ficha= new Ficha_Tecnica();
        $form = $this->createForm(Ficha_TecnicaType::class, $ficha);
          
        $form->handleRequest($request);
   if ($form->isSubmitted() && $form->isValid())
    {
      
        $em = $this->getDoctrine()->getManager();
        $em->persist($ficha);
        $em->flush();
         return $this->redirectToRoute('admin_ficha_show', array('id' => $ficha->getId()));
    }
   
    
    return $this->render('@Prueba/Productos/ingresoprod.html.twig', ["form" => $form->createView()]);
}

     public function dibujarFormProductoAction(Request $request)
    {
       $producto = new Productos();

 
        $form = $this->createForm(ProductosType::class, $producto);
        $form->handleRequest($request);
                 

    if ($form->isSubmitted() && $form->isValid())
    {
                  // Recogemos el fichero
        $file=$form['imagen']->getData();

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
        $em = $this->getDoctrine()->getManager();
        $em->persist($producto);
        $em->flush();
         return $this->redirectToRoute('admin_productos_show', array('id' => $producto->getId()));
    }
   
    
    return $this->render('@Prueba/Productos/ingresoprod.html.twig', ["form" => $form->createView()]);
}
    
    
       public function mensajeAction()
    {
          
       
    
      return $this->render('@Prueba/Productos/mensaje.html.twig');
     
     }
    
     
       public function modcrearProductoAction()
    {
          
       
    
      return $this->render('@Prueba/Productos/mensaje.html.twig');
     
     }
    
        public function buscarProductoAction(Request $request)
    {   
        $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
        $var=$request->request->get("nombrevul");
        if($var==""){
        $var=$request->request->get("nombrecien");
        $producto = $repository->findBy(
         array('nombrecientifico' => $var)
          );
        }else{
        $producto = $repository->findBy(
         array('nombrevulgar' => $var)
         );
        }
        return $this->render('@Prueba/Productos/index.html.twig', array('productos'=>$producto));
      
     
     }
       public function mensajeProductoAction(Request $request){
         
         
         return $this->render('@Prueba/Productos/mensajeproducto.html.twig');
      
         
         
         
     }
     public function fichaProductoAction(Request $request)
    {   
         
          $var=$_GET["ids"];
          $repository=$this->getDoctrine()->getRepository('PruebaBundle:Ficha_Tecnica');
          $ficha = $repository->findBy(
         array('producto' => $var)
          );
         $repository=$this->getDoctrine()->getRepository('PruebaBundle:Productos');
         $produ=$repository->findBy(
         array('id' => $var)
          );
        return $this->render('@Prueba/Productos/fichatecnica.html.twig', array('fichas'=>$ficha,'produ'=>$produ ));
      
     
     }
    
    
}
  
