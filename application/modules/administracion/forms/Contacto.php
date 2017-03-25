<?php

class Administracion_Form_Contacto extends Zend_Form
{

    public function init()
    {
        $this->setName('Contacto');
        $id = new Zend_Form_Element_Hidden('id');
        $domicilio = new Zend_Form_Element_Text('domicilio');
        $domicilio->setLabel('Domicilio')->setAttribs(array('class'=> 'input-sm'));
        
        
        $telefono = new Zend_Form_Element_Text('telefono');
        $telefono->setLabel('Telefono')->setAttribs(array('class'=> 'input-sm'));
        
        
        $mail = new Zend_Form_Element_Text('mail');
        $mail->setLabel('E-mail')->setAttribs(array('class'=> 'input-sm'));
        
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class'=>'btn btn-success btn-lg'));
        
        $this->addElements(array($id,$domicilio,$telefono,$mail,$submit));
    }


}

