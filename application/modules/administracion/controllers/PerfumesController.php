<?php

class Administracion_PerfumesController extends Zend_Controller_Action {

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
            $perfumes = new My\Entity\Articulo();

            $query = $this->_em->createQuery("SELECT art FROM My\Entity\Articulo art WHERE art.activo = 1 AND (art.categoria = 'Mujeres' OR art.categoria = 'Hombres' OR art.categoria = 'Niños' OR art.categoria = 'Bebes')");
            $perfumes = $query->getResult();

            $this->view->perfumes = $perfumes;
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

            $form = new Administracion_Form_PerfumeEditarDatos();

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
            $id = $this->getParam('id');
            $p = new My\Entity\Articulo();
            $p = $this->_em->find('My\Entity\Articulo', $id);

            $p->setActivo(false);


            $this->_em->merge($p);
            $this->_em->flush();

            $this->_helper->redirector('index');
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function nuevoAction() {

        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $form = new Administracion_Form_Perfume();

            $this->view->form = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                if ($form->isValid($data)) {

                    $form->upload->receive();

                    $perfume = new My\Entity\Articulo();
                    $perfume->setNombre($form->getValue('nombre'));
                    $perfume->setDescripcion($form->getValue('descripcion'));
                    $perfume->setPrecio($form->getValue('precio'));
                    $perfume->setActivo(true);
                    $perfume->setCategoria($form->getValue('categoria'));
                    $urlimg = substr(strrchr($form->upload->getFileName(), '\\'), 1); //PARA EL localhost
//                $url = substr(strrchr($formUpload->upload->getFileName(), '/'), 1);//para el web host

                    $perfume->setUrlimagen($urlimg);

                    $this->_em->persist($perfume);
                    $this->_em->flush();

                    $this->_helper->redirector('index');
                }
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

            $perf = new My\Entity\Articulo();
            $perf = $this->_em->find('My\Entity\Articulo', $id);

            $form->id->setValue($id);

            $this->view->urlimg = $perf->getUrlimagen();
            $this->view->form = $form;

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                if ($form->isValid($data)) {

                    $form->upload->receive();

                    $urlimg = substr(strrchr($form->upload->getFileName(), '\\'), 1); //PARA EL localhost
//                $url = substr(strrchr($formUpload->upload->getFileName(), '/'), 1);//para el web host


                    $perf->setUrlimagen($urlimg);

                    $this->_em->merge($perf);
                    $this->_em->flush();

                    $this->_helper->redirector('index');
                }
            }
        } else {
            $this->redirect('/administracion/login/');
        }
    }

    public function consultaAction() {

        $usuario = Zend_Auth::getInstance()->getIdentity();
        if (isset($usuario)) {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(); //no recarga la pagina

            $categ = $this->getParam('categoria', ''); // el '' es para cuando no lega nada como parametro, osea el valor por default del parametro


            $query = $this->_em->createQuery("SELECT per.id, per.nombre, per.descripcion, per.precio, per.activo, per.urlimagen, per.categoria  FROM My\Entity\Articulo per WHERE per.categoria = ?1 and per.activo = 1");
            $query->setParameter(1, $categ);
            $rows = $query->getResult();

            echo json_encode($rows);
        } else {
            $this->redirect('/administracion/login/');
        }
    }

}
