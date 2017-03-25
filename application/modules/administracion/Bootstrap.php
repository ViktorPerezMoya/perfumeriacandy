<?php

class Administracion_Bootstrap extends Zend_Application_Module_Bootstrap {

    protected function __initSession() {
        Zend_Session::start();
    }

}