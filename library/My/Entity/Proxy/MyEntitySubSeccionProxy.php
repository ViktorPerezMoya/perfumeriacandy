<?php

namespace My\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MyEntitySubSeccionProxy extends \My\Entity\SubSeccion implements \Doctrine\ORM\Proxy\Proxy
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

    public function getAlias()
    {
        $this->_load();
        return parent::getAlias();
    }

    public function setAlias($alias)
    {
        $this->_load();
        return parent::setAlias($alias);
    }

    public function getContenido()
    {
        $this->_load();
        return parent::getContenido();
    }

    public function setContenido($contenido)
    {
        $this->_load();
        return parent::setContenido($contenido);
    }

    public function getFecha()
    {
        $this->_load();
        return parent::getFecha();
    }

    public function setFecha($fecha)
    {
        $this->_load();
        return parent::setFecha($fecha);
    }

    public function getPadres()
    {
        $this->_load();
        return parent::getPadres();
    }

    public function setSeccionPadre(\My\Entity\Seccion $seccion)
    {
        $this->_load();
        return parent::setSeccionPadre($seccion);
    }

    public function quitarPadre(\My\Entity\Seccion $seccion)
    {
        $this->_load();
        return parent::quitarPadre($seccion);
    }

    public function getImagenes()
    {
        $this->_load();
        return parent::getImagenes();
    }

    public function agregarImagen(\My\Entity\Imagen $imagen)
    {
        $this->_load();
        return parent::agregarImagen($imagen);
    }

    public function quitarImagen(\My\Entity\Imagen $imagen)
    {
        $this->_load();
        return parent::quitarImagen($imagen);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nombre', 'alias', 'contenido', 'fecha', 'seccionesPadre', 'imagenes');
    }
}