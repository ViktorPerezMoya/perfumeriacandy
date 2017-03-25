<?php

class Administracion_IndexController extends Zend_Controller_Action
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

    public function init() {
        /* Initialize action controller here */
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layout_administracion');


        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();

        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction()
    {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            
        }else{
            $this->redirect('/administracion/login/');
        }
    }


}

