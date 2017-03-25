<?php

namespace My\Entity;

/**
 * @Entity
 */
class Articulo {

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
    protected $nombre;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $descripcion;

    /**
     *
     * @var string
     * @Column(type="float")
     */
    protected $precio;

    /**
     * @var boolean 
     * @Column (name="activo", type="boolean", options={"default"=false})
     * 
     */
    protected $activo;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $urlimagen;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $categoria;

    public function __construct() {
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getUrlimagen() {
        return $this->urlimagen;
    }

    function setUrlimagen($urlimagen) {
        $this->urlimagen = $urlimagen;
    }
    
    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

        public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
