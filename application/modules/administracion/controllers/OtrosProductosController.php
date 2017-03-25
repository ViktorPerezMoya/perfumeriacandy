<?php

class Administracion_OtrosProductosController extends Zend_Controller_Action {

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

    /*
      $usuario = Zend_Auth::getInstance()->getIdentity();
      if (isset($usuario)) {

      }else{
      $this->redirect('/administracion/login/');
      }
     *  */

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
            $prod = new My\Entity\Articulo();

            $query = $this->_em->createQuery("SELECT art FROM My\Entity\Articulo art WHERE art.activo = 1 AND art.categoria <> 'Mujeres' AND art.categoria <> 'Hombres' AND art.categoria <> 'Niños' AND art.categoria <> 'Bebes'");
            $prod = $query->getResult();

            $this->view->productos = $prod;

            $query2 = $this->_em->createQuery("SELECT DISTINCT(art.categoria) FROM My\Entity\Articulo art WHERE art.categoria <> 'Mujeres' AND art.categoria <> 'Hombres' AND art.categoria <> 'Niños' AND art.categoria <> 'Bebes' ORDER BY art.categoria ASC");
            $categorias = $query2->getResult();
            $this->view->categorias = $categorias;
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function editarAction() {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $id = $this->getParam('id');
            $p = new My\Entity\Articulo();
            $p = $this->_em->find('My\Entity\Articulo', $id);

            $form = new Administracion_Form_ArticuloEditarDatos();

            $form->id->setValue($p->getId());
            $form->nombre->setValue($p->getNombre());
            $form->descripcion->setValue($p->getDescripcion());
            $form->precio->setValue($p->getPrecio());
            $form->categoria->setValue($p->getCategoria());

            $this->view->form = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
//            var_dump($data);die();
                if ($form->isValid($data)) {
                    $perfume = new My\Entity\Articulo();
                    $perfume->setId($id);
                    $perfume->setNombre($form->getValue('nombre'));
                    $perfume->setDescripcion($form->getValue('descripcion'));
                    $perfume->setPrecio($form->getValue('precio'));
                    $perfume->setActivo(true);
                    $perfume->setCategoria($form->getValue('categoria'));


                    $this->_em->merge($perfume);
                    $this->_em->flush();

                    $this->_helper->redirector('index');
                }
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function borrarAction() {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $usuario = Zend_Auth::getInstance()->getIdentity();
            if (isset($usuario)) {
                $id = $this->getParam('id');
                $articulo = new My\Entity\Articulo();
                $articulo = $this->_em->find('My\Entity\Articulo', $id);

                $articulo->setActivo(false);


                $this->_em->merge($articulo);
                $this->_em->flush();

                $this->_helper->redirector('index');
            } else {
                $this->redirect('/administracion/login/');
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function cambiarImagenAction() {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $form = new Administracion_Form_CambiarImagen();

            $id = $this->getRequest()->getParam('id');

            $articulo = new My\Entity\Articulo();
            $articulo = $this->_em->find('My\Entity\Articulo', $id);

            $form->id->setValue($id);

            $this->view->urlimg = $articulo->getUrlimagen();
            $this->view->form = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                if ($form->isValid($data)) {

                    $form->upload->receive();

                    $urlimg = substr(strrchr($form->upload->getFileName(), '\\'), 1); //PARA EL localhost
//                $url = substr(strrchr($formUpload->upload->getFileName(), '/'), 1);//para el web host


                    $articulo->setUrlimagen($urlimg);

                    $this->_em->merge($articulo);
                    $this->_em->flush();

                    $this->_helper->redirector('index');
                }
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function nuevoAction() {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $form = new Administracion_Form_Articulo();

            $this->view->form = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                if ($form->isValid($data)) {

                    $form->upload->receive();

                    $articulo = new My\Entity\Articulo();
                    $articulo->setNombre($form->getValue('nombre'));
                    $articulo->setDescripcion($form->getValue('descripcion'));
                    $articulo->setPrecio($form->getValue('precio'));
                    $articulo->setActivo(true);
                    $articulo->setCategoria($form->getValue('categoria'));
                    $urlimg = substr(strrchr($form->upload->getFileName(), '\\'), 1); //PARA EL localhost
//                $url = substr(strrchr($formUpload->upload->getFileName(), '/'), 1);//para el web host

                    $articulo->setUrlimagen($urlimg);

                    $this->_em->persist($articulo);
                    $this->_em->flush();

                    $this->_helper->redirector('index');
                }
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

}
