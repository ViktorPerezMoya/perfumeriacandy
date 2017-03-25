<?php

class Administracion_Form_ArticuloEditarDatos extends Zend_Form
{

    public function init()
    {
        $this->setName('Perfume');
        $id = new Zend_Form_Element_Hidden('id');
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre')->setAttribs(array('class'=> 'input-sm'));
        
        $descripcion = new Zend_Form_Element_Textarea('descripcion');
        $descripcion->setLabel('Descripción')->setAttribs(array('class'=> 'input-sm',
                                                            'rows'=>6));
        
        $precio = new Zend_Form_Element_Text('precio');
        $precio->setLabel('Precio')->setAttribs(array('class'=> 'input-sm'));
        
        
        $categoria = new Zend_Form_Element_Text('categoria');
        $categoria->setLabel('Categoria')->setAttribs(array('class'=> 'input-sm'));
        
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class'=>'btn btn-success btn-lg'));
        
        $this->addElements(array($id,$nombre,$descripcion,$precio,$categoria,$submit));
    }


}

