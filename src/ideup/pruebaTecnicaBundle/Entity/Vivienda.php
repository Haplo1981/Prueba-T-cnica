<?php

namespace ideup\pruebaTecnicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 

/**
 * ideup\pruebaTecnicaBundle\Entity\Vivienda
 * @ORM\Entity(repositoryClass="ideup\pruebaTecnicaBundle\Entity\ViviendaRepository")
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
    
    /**
     * @ORM\ManyToOne(targetEntity="Categorias", inversedBy="viviendas")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    protected $categoria_id;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function addImagene(\ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes)
    {
        $this->imagenes[] = $imagenes;
    
        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes
     */
    public function removeImagene(\ideup\pruebaTecnicaBundle\Entity\ImagsVivienda $imagenes)
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

    /**
     * Set categoria_id
     *
     * @param ideup\pruebaTecnicaBundle\Entity\Categorias $categoriaId
     * @return Vivienda
     */
    public function setCategoriaId(\ideup\pruebaTecnicaBundle\Entity\Categorias $categoriaId = null)
    {
        $this->categoria_id = $categoriaId;
    
        return $this;
    }

    /**
     * Get categoria_id
     *
     * @return ideup\pruebaTecnicaBundle\Entity\Categorias 
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }
}