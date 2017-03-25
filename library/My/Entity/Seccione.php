<?php

namespace My\Entity;

/**
 * @Entity
 */
class Seccione {

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
     * @Column(type="string", length=255)
     */
    protected $titulo;

    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $contenido;

    /**
     *
     * @var string
     * @Column(type="text", length=255)
     */
    protected $urlimagen;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $seccion;

    public function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getUrlimagen() {
        return $this->urlimagen;
    }

    function getSeccion() {
        return $this->seccion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setUrlimagen($urlimagen) {
        $this->urlimagen = $urlimagen;
    }

    function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
