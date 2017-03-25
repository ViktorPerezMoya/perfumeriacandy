<?php

namespace My\Entity;

/**
 * @Entity
 */
class SubSeccion {

    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombre;

    /**
     * @var string
     * @Column(type="string", length=255)
     */
    protected $alias;

    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $contenido;

    /**
     *
     * @var date
     * @Column (type="date")
     */
    protected $fecha;

    /**
     * @ManyToMany(targetEntity="Seccion", mappedBy="subSecciones", cascade={"persist"})
     * 
     * */
    protected $seccionesPadre;

    /**
     * @ManyToMany(targetEntity="Imagen", mappedBy="subSecciones", cascade={"persist"})
     * 
     */
    protected $imagenes;

    /**
     *
     * @ManyToMany (targetEntity="BotonModal", inversedBy="subSecciones", cascade={"persist"}, fetch="EAGER")
     */
    protected $botones;
    public function __construct() {
        $this->archivos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->seccionesPadre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->botones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function getFecha() {
        return date_format($this->fecha, 'Y-m-d');
    }

    public function setFecha($fecha) {
        $this->fecha = new \DateTime($fecha);
    }

    public function getPadres() {
        return $this->seccionesPadre;
    }

    public function setSeccionPadre(Seccion $seccion) {
        $seccion->agregarSubSeccion($this);
        $this->seccionesPadre[] = $seccion;
    }

    public function quitarPadre(Seccion $seccion) {
        $seccion->quitarSubSeccion($this);
        $this->seccionesPadre->removeElement($seccion);
    }

    public function getImagenes() {
        return $this->imagenes;
    }

    public function agregarImagen(Imagen $imagen) {
        $imagen->agregarSubSeccion($this);
        $this->imagenes[] = $imagen;
    }

    public function quitarImagen(Imagen $imagen) {
        $imagen->quitarSubSeccion($this);
        $this->imagenes->removeElement($imagen);
    }
    
    public function getBotones() {
        return $this->botones;
    }

    public function agregarBoton(BotonModal $boton) {
        //$boton->agregarSubSeccion($this);
        $this->botones[] = $boton;
    }

    public function quitarBoton(BotonModal $boton) {
        $boton->quitarSubSeccion($boton);
        $this->botones->removeElement($boton);
                
     }

}
