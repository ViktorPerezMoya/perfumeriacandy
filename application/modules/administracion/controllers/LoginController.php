<?php

class Administracion_LoginController extends Zend_Controller_Action
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
        $layout->setLayout('layoutnull');


        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();

        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction()
    {
        $form = new Administracion_Form_Login();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

///verificacion de existencia

                $usuario = $form->getValue('txt_user');
                $clave = $form->getValue('txt_pass');

                $authAdapter = new My_Auth_Adapter($usuario, $clave);
                $result = Zend_Auth::getInstance()->authenticate($authAdapter);

                if (Zend_Auth::getInstance()->hasIdentity()) {
                    $usuario = $this->_em->find('My\Entity\Usuario', Zend_Auth::getInstance()->getIdentity()->getId());
                    
                    /**                     * ******************* namespace *************************** */

                    Zend_Session::start();

                    $mysession = new Zend_Session_Namespace($usuario->getNombre());
                    //duracion de datos de la sesion: 5 minutos de inactividad y se cierra la sesion
                    $mysession->setExpirationSeconds(3600);
                    //bloqueo de namespace
                    $mysession->lock();

                    /*                     * ******************** FIN namespace *************************** */

//                    
                    $this->_em->flush();


//el usuario se logue y queda guradado en una variabe el nombre de usuario para ser enviado
//a controlador index de la administracion
/*
NOTA!! EN EL CASO DE QUE NO FUNCIONE EL LOGIN RECORDAR SI ESTAMOS TARABAJANDO CON OTRA  TABLA QUE NO ES LA ORIGINAL CON LA QUE SE COSTRUYO LA PAGINA WEB DE 
 * LA MUNICIPALIDDA DE LAVALLE. eNTONCES HAY QUE Y A CAMBIAR LOS GET Y SET TANTO DE LA ENTIDAD COMO DE SU CLASE CORRESPONDIENTE EN EL PROXY Y TAMBIEN AGREGAR LA CLASE USUARIO EN LA CARPETA MODELS DEL MODULO ACTUAL CAMBIANDO TAMBIEN ALLI LOS GET Y SET QUE SE USEN.
  */
                    $this->_redirector->gotoUrl('/administracion/index');

//                            )
//                    );
                } else {
                    $this->view->message = implode('  ', $result->getMessages());
                }
            }
            $this->view->errors = $form->getErrorMessages();
        }
    }

    public function salirAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
        }
        $this->_helper->redirector('index');
    }


}


