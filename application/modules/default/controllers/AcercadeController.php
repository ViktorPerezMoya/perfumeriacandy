<?php

class Default_AcercadeController extends Zend_Controller_Action
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
        $seccion = new My\Entity\Seccione();
        $query = $this->_em->createQuery("SELECT sec FROM My\Entity\Seccione sec WHERE sec.seccion  =  'acerca de'");
        $seccion = $query->getSingleResult();
        
        $this->view->seccion = $seccion;
    }


}

