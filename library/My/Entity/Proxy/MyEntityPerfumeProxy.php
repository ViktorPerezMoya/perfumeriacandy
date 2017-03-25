<?php

namespace My\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MyEntityPerfumeProxy extends \My\Entity\Perfume implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    private function _load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    
    public function getId()
    {
        $this->_load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->_load();
        return parent::setId($id);
    }

    public function getNombre()
    {
        $this->_load();
        return parent::getNombre();
    }

    public function setNombre($nombre)
    {
        $this->_load();
        return parent::setNombre($nombre);
    }

    public function getDescripcion()
    {
        $this->_load();
        return parent::getDescripcion();
    }

    public function setDescripcion($descripcion)
    {
        $this->_load();
        return parent::setDescripcion($descripcion);
    }

    public function getPrecio()
    {
        $this->_load();
        return parent::getPrecio();
    }

    public function setPrecio($precio)
    {
        $this->_load();
        return parent::setPrecio($precio);
    }

    

    public function getActivo()
    {
        $this->_load();
        return parent::getActivo();
    }

    public function setActivo($activo)
    {
        $this->_load();
        return parent::setActivo($activo);
    }

    public function getUrlimagen() {
        $this->_load();
        parent::getUrlimagen();
    }
    
    public function setUrlimagen($urlimagen) {
        $this->_load();
        parent::setUrlimagen($urlimagen);
    }
    
    public function getCategoria() {
        
        $this->_load();
        parent::getCategoria();
    }
    
    public function setCategoria($categoria) {
        
        $this->_load();
        parent::setCategoria($categoria);
    }

    public function __get($name)
    {
        $this->_load();
        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        $this->_load();
        return parent::__set($name, $value);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nombre', 'descripcion', 'precio', 'activo','urlimagen','categoria');
    }
}