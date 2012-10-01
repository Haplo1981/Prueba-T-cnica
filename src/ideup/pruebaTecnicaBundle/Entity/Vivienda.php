<?php

namespace ideup\pruebaTecnicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 

/**
 * ideup\pruebaTecnicaBundle\Entity\Vivienda
 * @ORM\Entity
 * @ORM\Table(name="vivienda")
 */
class Vivienda
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="string", length=250) 
     */
    protected $descripcion_corta;
    
    /**
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $precio;
    
    /**
     *
     * @ORM\Column(type="text")
     */
    protected $descripcion;
    
    /**
     *
     * @ORM\Column(type="string", length=250)
     */
    protected $direccion;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ImagsVivienda", mappedBy="codVivienda")
     */
    protected $imagenes;
    
    public function __construct()
    {
        $this->imagenes = new ArrayCollection();
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion_corta
     *
     * @param string $descripcionCorta
     * @return Vivienda
     */
    public function setDescripcionCorta($descripcionCorta)
    {
        $this->descripcion_corta = $descripcionCorta;
    
        return $this;
    }

    /**
     * Get descripcion_corta
     *
     * @return string 
     */
    public function getDescripcionCorta()
    {
        return $this->descripcion_corta;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Vivienda
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Vivienda
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Vivienda
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Add imagenes
     *
     * @param ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes
     * @return Vivienda
     */
    public function addImagen(\ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes)
    {
        $this->imagenes[] = $imagenes;
    
        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes
     */
    public function removeImagen(\ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }
}