<?php

namespace PruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productos
 *
 * @ORM\Table(name="productos")
 * @ORM\Entity(repositoryClass="PruebaBundle\Repository\ProductosRepository")
 */
class Productos
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
     * @ORM\Column(name="nombrevulgar", type="string", length=60)
     */
    private $nombrevulgar;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrecientifico", type="string", length=100)
     */
    private $nombrecientifico;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreingles", type="string", length=100)
     */
    private $nombreingles;

    /**
     * @var string
     *
     * @ORM\Column(name="fuente", type="string", length=60)
     */
    private $fuente;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=100)
     
     */
    private $imagen;

   
    

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
     * Set nombrevulgar
     *
     * @param string $nombrevulgar
     *
     * @return Productos
     */
    public function setNombrevulgar($nombrevulgar)
    {
        $this->nombrevulgar = $nombrevulgar;

        return $this;
    }

    /**
     * Get nombrevulgar
     *
     * @return string
     */
    public function getNombrevulgar()
    {
        return $this->nombrevulgar;
    }

    /**
     * Set nombrecientifico
     *
     * @param string $nombrecientifico
     *
     * @return Productos
     */
    public function setNombrecientifico($nombrecientifico)
    {
        $this->nombrecientifico = $nombrecientifico;

        return $this;
    }

    /**
     * Get nombrecientifico
     *
     * @return string
     */
    public function getNombrecientifico()
    {
        return $this->nombrecientifico;
    }

    /**
     * Set nombreingles
     *
     * @param string $nombreingles
     *
     * @return Productos
     */
    public function setNombreingles($nombreingles)
    {
        $this->nombreingles = $nombreingles;

        return $this;
    }

    /**
     * Get nombreingles
     *
     * @return string
     */
    public function getNombreingles()
    {
        return $this->nombreingles;
    }

    /**
     * Set fuente
     *
     * @param string $fuente
     *
     * @return Productos
     */
    public function setFuente($fuente)
    {
        $this->fuente = $fuente;

        return $this;
    }

    /**
     * Get fuente
     *
     * @return string
     */
    public function getFuente()
    {
        return $this->fuente;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Productos
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

  
}
