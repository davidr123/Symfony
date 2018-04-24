<?php

namespace PruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Ficha_Tecnica
 *
 * @ORM\Table(name="ficha__tecnica")
 * @ORM\Entity(repositoryClass="PruebaBundle\Repository\Ficha_TecnicaRepository")
 */
class Ficha_Tecnica
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @var string
     *
     * @ORM\Column(name="nutritivo", type="string", length=50)
     */
    private $nutritivo;

    /**
     * @var int
     *
     * @ORM\Column(name="valor100gr", type="integer")
     */
    private $valor100gr;

    /**
     * @var string
     *
     * @ORM\Column(name="metodo", type="string", length=50)
     */
    private $metodo;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Productos", inversedBy="ficha_tecnica")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     */
    private $producto;
  


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

  

    /**
     * Set nutritivo
     *
     * @param string $nutritivo
     *
     * @return Ficha_Tecnica
     */
    public function setNutritivo($nutritivo)
    {
        $this->nutritivo = $nutritivo;

        return $this;
    }

    /**
     * Get nutritivo
     *
     * @return string
     */
    public function getNutritivo()
    {
        return $this->nutritivo;
    }

    /**
     * Set valor100gr
     *
     * @param integer $valor100gr
     *
     * @return Ficha_Tecnica
     */
    public function setValor100gr($valor100gr)
    {
        $this->valor100gr = $valor100gr;

        return $this;
    }

    /**
     * Get valor100gr
     *
     * @return int
     */
    public function getValor100gr()
    {
        return $this->valor100gr;
    }

    /**
     * Set metodo
     *
     * @param string $metodo
     *
     * @return Ficha_Tecnica
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get metodo
     *
     * @return string
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set productosIdProducto
     *
     * @param integer $productosIdProducto
     *
     * @return Ficha_Tecnica
     */
    public function setProductosIdProducto(\PruebaBundle\Entity\Productos $producto = null)
    {
        $this->productosIdProducto = $producto;

        return $this;
    }

    /**
     * Get productosIdProducto
     *
     * @return int
     */
    public function getProductosIdProducto()
    {
        return $this->productosIdProducto;
    }
}
