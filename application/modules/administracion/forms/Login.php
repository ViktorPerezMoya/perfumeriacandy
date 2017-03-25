<?php

class Administracion_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setName("Ingreos al sistema");
        
        $txtUser = new Zend_Form_Element_Text('txt_user');
        $txtUser->setRequired()->addErrorMessage('Campo obligatorio');
        $txtUser->setLabel('Usuario: ');
        $txtUser->setAttribs(array('class'=>'input-sm','placeholder'=>'usuario','autofocus'=>'true'));
        
        $txtPass = new Zend_Form_Element_Password('txt_pass');
        $txtPass->setRequired()->addErrorMessage('Campo obligatorio');
        $txtPass->setLabel('Contraseña: ');
        $txtPass->setAttribs(array('class'=>'input-sm','placeholder'=>'password'));
        
        
        
        $submit =  new Zend_Form_Element_Submit('btn_enviar');
        $submit->setLabel('Ingresar');
        $submit->setAttribs(array('class'=>'btn btn-info'));
        
        $this->addElements(array($txtUser,$txtPass,$submit));
    }


}

