<?php

namespace My\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MyEntityLicitacionProxy extends \My\Entity\Licitacion implements \Doctrine\ORM\Proxy\Proxy
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

    public function getNumero()
    {
        $this->_load();
        return parent::getNumero();
    }

    public function setNumero($numero)
    {
        $this->_load();
        return parent::setNumero($numero);
    }

    public function getAnio()
    {
        $this->_load();
        return parent::getAnio();
    }

    public function setAnio($anio)
    {
        $this->_load();
        return parent::setAnio($anio);
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

    public function getFechaDeApertura()
    {
        $this->_load();
        return parent::getFechaDeApertura();
    }

    public function setFechaDeApertura($fecha)
    {
        $this->_load();
        return parent::setFechaDeApertura($fecha);
    }

    public function getHoraDeApertura()
    {
        $this->_load();
        return parent::getHoraDeApertura();
    }

    public function setHoraDeApertura($hora)
    {
        $this->_load();
        return parent::setHoraDeApertura($hora);
    }

    public function getFechaDeCierre()
    {
        $this->_load();
        return parent::getFechaDeCierre();
    }

    public function setFechaDeCierre($fecha)
    {
        $this->_load();
        return parent::setFechaDeCierre($fecha);
    }

    public function getHoraDeCierre()
    {
        $this->_load();
        return parent::getHoraDeCierre();
    }

    public function setHoraDeCierre($hora)
    {
        $this->_load();
        return parent::setHoraDeCierre($hora);
    }

    public function getTipoDeContratacion()
    {
        $this->_load();
        return parent::getTipoDeContratacion();
    }

    public function setTipoDeContratacion($tipoDeContratacion)
    {
        $this->_load();
        return parent::setTipoDeContratacion($tipoDeContratacion);
    }

    public function getCreado()
    {
        $this->_load();
        return parent::getCreado();
    }

    public function setModificado()
    {
        $this->_load();
        return parent::setModificado();
    }

    public function getModificado()
    {
        $this->_load();
        return parent::getModificado();
    }

    public function getActiva()
    {
        $this->_load();
        return parent::getActiva();
    }

    public function setActiva($activa)
    {
        $this->_load();
        return parent::setActiva($activa);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'numero', 'anio', 'descripcion', 'fechaDeApertura', 'horaDeApertura', 'fechaDeCierre', 'horaDeCierre', 'tipoDeContratacion', 'creado', 'modificado', 'activo');
    }
}