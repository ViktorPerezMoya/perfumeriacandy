<?php

class Default_ProductosController extends Zend_Controller_Action
{

    /**
     * Redirector - defined for code completion
     *
     * @var Zend_Controller_Action_Helper_Redirector
     */
    protected $_redirector = null;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $_em = null;


    public function init()
    {
        /* Initialize action controller here */
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layout');

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();

        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction()
    {
        
    }

    public function perfumesMujerAction()
    {
        $query = $this->_em->createQuery("SELECT hom FROM My\Entity\Articulo hom WHERE hom.categoria = 'Mujeres' AND  hom.activo = 1");
        $perfumes = $query->getResult();
        $this->view->perfumes = $perfumes;
    }

    public function perfumesHombresAction()
    {
        $query = $this->_em->createQuery("SELECT hom FROM My\Entity\Articulo hom WHERE hom.categoria = 'Hombres' AND  hom.activo = 1");
        $perfumes = $query->getResult();
        $this->view->perfumes = $perfumes;
    }

    public function perfumesNinosAction()
    {
        $query = $this->_em->createQuery("SELECT hom FROM My\Entity\Articulo hom WHERE hom.categoria = 'Niños' AND  hom.activo = 1");
        $perfumes = $query->getResult();
        $this->view->perfumes = $perfumes;
    }

    public function perfumesBebesAction()
    {
        $query = $this->_em->createQuery("SELECT hom FROM My\Entity\Articulo hom WHERE hom.categoria = 'Bebes' AND  hom.activo = 1");
        $perfumes = $query->getResult();
        $this->view->perfumes = $perfumes;
    }


}









