<?php
    namespace ideup\pruebaTecnicaBundle\Entity;
    
    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    
    /**
     * @ORM\Entity
     * @ORM\Table(name="categorias")
     */
    class Categorias{
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
        protected $descripcion;
        
        /**
         * @ORM\OneToMany(targetEntity="Vivienda", mappedBy="categoria_id")
         */
        protected $viviendas;
        /**
     * Constructor
     */
    public function __construct()
    {
        $this->viviendas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->getDescripcion();
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categorias
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
     * Add viviendas
     *
     * @param ideup\pruebaTecnicaBundle\Entity\Vivienda $viviendas
     * @return Categorias
     */
    public function addVivienda(\ideup\pruebaTecnicaBundle\Entity\Vivienda $viviendas)
    {
        $this->viviendas[] = $viviendas;
    
        return $this;
    }

    /**
     * Remove viviendas
     *
     * @param ideup\pruebaTecnicaBundle\Entity\Vivienda $viviendas
     */
    public function removeVivienda(\ideup\pruebaTecnicaBundle\Entity\Vivienda $viviendas)
    {
        $this->viviendas->removeElement($viviendas);
    }

    /**
     * Get viviendas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getViviendas()
    {
        return $this->viviendas;
    }
}