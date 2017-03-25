<?php

class Default_VariosController extends Zend_Controller_Action
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
        $prod = new My\Entity\Articulo();

        $query = $this->_em->createQuery("SELECT art FROM My\Entity\Articulo art WHERE art.activo = 1 AND art.categoria <> 'Mujeres' AND art.categoria <> 'Hombres' AND art.categoria <> 'Niños' AND art.categoria <> 'Bebes'");
        $prod = $query->getResult();

        $this->view->productos = $prod;
        
        $query2 = $this->_em->createQuery("SELECT DISTINCT(art.categoria) FROM My\Entity\Articulo art WHERE art.categoria <> 'Mujeres' AND art.categoria <> 'Hombres' AND art.categoria <> 'Niños' AND art.categoria <> 'Bebes' ORDER BY art.categoria ASC");
        $categorias =$query2->getResult();
        $this->view->categorias = $categorias;
    }

    public function consultaAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(); //no recarga la pagina

        $categ = $this->getParam('categoria', ''); // el '' es para cuando no lega nada como parametro, osea el valor por default del parametro
        

        $query = $this->_em->createQuery("SELECT per.id, per.nombre, per.descripcion, per.precio, per.activo, per.urlimagen, per.categoria  FROM My\Entity\Articulo per WHERE per.categoria = ?1 and per.activo = 1");
        $query->setParameter(1, $categ);
        $rows = $query->getResult();

        echo json_encode($rows);
    }


}



