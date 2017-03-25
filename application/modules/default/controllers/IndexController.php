<?php

class Default_IndexController extends Zend_Controller_Action
{

    /**
     * Redirector - defined for code completion
     *
     * @var Zend_Controller_Action_Helper_Redirector
     */
    protected $_redirector = null;
    
    
    public function init()
    {
        /* Initialize action controller here */
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layoutnull');


        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction()
    {
        // action body
    }


}

