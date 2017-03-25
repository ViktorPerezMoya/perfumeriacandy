<?php

namespace My\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Esta entidad representa a un modal de Twitter Bootstrap que será relacionado
 * con las subsecciones para poder dinámicamente ser creados, modificados y eliminados
 * de las subsecciones para su posterior renderización en las vistas a través de
 * un View Helper
 *
 * @author ieltxu Algañarás (ieltxu.alganaras@gmail.com)
 * @Entity
 */
class BotonModal {
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     *
     * @var string
     * @Column (type="string", length="255")
     */
    protected $textoBoton;
    
    /**
     *
     * @var string
     * @Column (type="string", length="255")
     */
    protected $tituloModal;
    
    /**
     *
     * @var string
     * @Column (type="text")
     */
    protected $contenidoModal;
    
    /**
     *
     * @var string
     * @Column (type="string", length="255", nullable="true")
     */
    protected $footerModal;
    
    /**
     *
     * @ManyToMany (targetEntity="SubSeccion", mappedBy="botones", cascade={"persist"})
     */
    protected $subSecciones;
    
    /**
     * @ManyToMany(targetEntity="ImagenBotonera", mappedBy="botones", cascade={"persist"})
     * 
     */
    protected $imagenes;
    
    /**
     *  @var String
     * @Column (type="string", length="255", nullable="true")
     * 
     */
    protected $imagenBoton;
    
    /**
     * @var boolean
     * @Column (type="boolean", nullable="false")
     * 
     */
    protected $activo;

    public function __construct() {
        $this->subSecciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTextoBoton() {
        return $this->textoBoton;
    }

    public function getTituloModal() {
        return $this->tituloModal;
    }

    public function getContenidoModal() {
        return $this->contenidoModal;
    }

    public function getFooterModal() {
        return $this->footerModal;
    }

    public function getSubSecciones() {
        return $this->subSecciones;
    }

    public function setTextoBoton($textoBoton) {
        $this->textoBoton = $textoBoton;
    }

    public function setTituloModal($tituloModal) {
        $this->tituloModal = $tituloModal;
    }

    public function setContenidoModal($contenidoModal) {
        $this->contenidoModal = $contenidoModal;
    }

    public function setFooterModal($footerModal) {
        $this->footerModal = $footerModal;
    }

    public function setSubSecciones($subsecciones) {
        $this->subSecciones = $subsecciones;
    }
    
    public function agregarSubSeccion(SubSeccion $subseccion) {
        $this->subSecciones[] = $subseccion;
    }
    
    public function quitarSubSeccion (SubSeccion $subseccion) {
        
    }
    
    public function getImagenes() {
        return $this->imagenes;
    }

    public function agregarImagen(ImagenBotonera $imagen) {
        $this->imagenes[] = $imagen;
    }

    public function quitarImagen(ImagenBotonera $imagen) {
        $this->imagenes->removeElement($imagen);
    }
    
    public function getImagenBoton() {
        return $this->imagenBoton;
    }

    public function setImagenBoton($imagenBoton) {
        $this->imagenBoton = $imagenBoton;
    }
    
    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }


}
