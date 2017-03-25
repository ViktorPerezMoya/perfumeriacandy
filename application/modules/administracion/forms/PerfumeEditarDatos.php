<?php

class Administracion_Form_PerfumeEditarDatos extends Zend_Form
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
        
        $categoria = new Zend_Form_Element_Select('categoria');
        $categoria->setLabel('Seleccione tipo:')
                                ->setAttrib('class', 'form-control')
                                ->setRequired(true);
        $categoria->addMultiOption('Mujeres', 'Mujeres');
        $categoria->addMultiOption('Hombres', 'Hombres');
        $categoria->addMultiOption('Niños', 'Niños');
        $categoria->addMultiOption('Bebes', 'Bebes');
        
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class'=>'btn btn-success btn-lg'));
        
        $this->addElements(array($id,$nombre,$descripcion,$precio,$categoria,$submit));
    }


}

