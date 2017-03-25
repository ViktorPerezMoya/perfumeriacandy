<?php

namespace My\Entity;

/**
 * Description of Usuario
 *
 * @author Ieltxu
 */
/**
 * @Entity
 */
class Usuario
{
    
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
    protected $apellido;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $user;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $password;
    
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    public function getApellido() {
        return $this->apellido;
    }
    
    public function setUser($user) {
        $this->user = $user;
    }
    
    public function getUser() {
        return $this->user;
    }
    
    
    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }


    
    
}

