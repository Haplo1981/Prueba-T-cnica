<?php

namespace ideup\pruebaTecnicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ideup\pruebaTecnicaBundle\Entity\ImagsVivienda
 * @ORM\Entity
 * @ORM\Table(name="ImagsVivienda")
 */
class ImagsVivienda
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $nombreImag;
    
    /**
     *
     * @ORM\Column(type="string", length=75)
     */
    protected $alt;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vivienda", inversedBy="imagenes")
     * @ORM\JoinColumn(name="vivienda_id", referencedColumnName="id")
     */
    protected $codVivienda;
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
     * Set nombreImag
     *
     * @param string $nombreImag
     * @return ImagsVivienda
     */
    public function setNombreImag($nombreImag)
    {
        $this->nombreImag = $nombreImag;
    
        return $this;
    }

    /**
     * Get nombreImag
     *
     * @return string 
     */
    public function getNombreImag()
    {
        return $this->nombreImag;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return ImagsVivienda
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    
        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set codVivienda
     *
     * @param ideup\pruebaTecnicaBundle\Entity\Vivienda $codVivienda
     * @return ImagsVivienda
     */
    public function setCodVivienda(\ideup\pruebaTecnicaBundle\Entity\Vivienda $codVivienda = null)
    {
        $this->codVivienda = $codVivienda;
    
        return $this;
    }

    /**
     * Get codVivienda
     *
     * @return ideup\pruebaTecnicaBundle\Entity\Vivienda 
     */
    public function getCodVivienda()
    {
        return $this->codVivienda;
    }
}