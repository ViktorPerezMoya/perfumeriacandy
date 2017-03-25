<?php

class Administracion_SeccionesController extends Zend_Controller_Action {

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

    public function indexAction() {

        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            
        } else {
            $this->redirect('/administracion/login/');
        }
        // action body
    }

    public function acercaDeAction() {

        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $seccion = new My\Entity\Seccione();
            $query = $this->_em->createQuery("SELECT sec FROM My\Entity\Seccione sec WHERE sec.seccion  =  'acerca de'");
            $seccion = $query->getSingleResult();


            $form = new Administracion_Form_AcercaDe();

            $form->titulo->setValue($seccion->getTitulo());
            $form->contenido->setValue($seccion->getContenido());

            $this->view->formulario = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                if ($form->isValid($data)) {


                    $seccion->setTitulo($form->getValue('titulo'));
                    $seccion->setContenido($form->getValue('contenido'));

                    $this->_em->merge($seccion);
                    $this->_em->flush();

                    $this->_redirector->gotoUrl('/administracion/'); //redireccionamos  
                    //$this->_redirector->gotoUrl('/cuentas/verdeudas/id/' . $id); //redireccionamos
                }
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function contactoAction() {

        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $seccion = new My\Entity\Seccione();
            $query = $this->_em->createQuery("SELECT sec FROM My\Entity\Seccione sec WHERE sec.seccion  =  'contacto'");
            $seccion = $query->getSingleResult();

            $form = new Administracion_Form_Contacto();
            $this->view->formulario = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                if ($form->isValid($data)) {


                    $cadena = '<p>
                                Domicilio: ' . $form->getValue('domicilio') . '
                            </p>
                            <p>
                                Telefono: ' . $form->getValue('telefono') . '
                            </p>
                            <p>
                                Escribenos a <a href="mailto:' . $form->getValue('mail') . '">' . $form->getValue('mail') . '</a>
                            </p>';

                    $seccion->setContenido($cadena);

                    $this->_em->merge($seccion);
                    $this->_em->flush();


                    $this->_redirector->gotoUrl('/administracion/'); //redireccionamos  
                    //$this->_redirector->gotoUrl('/cuentas/verdeudas/id/' . $id); //redireccionamos
                }
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

}
