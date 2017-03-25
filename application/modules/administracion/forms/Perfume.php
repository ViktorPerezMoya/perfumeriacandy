<?php

class Administracion_Form_Perfume extends Zend_Form
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
        
        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Elegir Imagen')
                ->setRequired()
                ->setDestination(APPLICATION_PATH . '/../public/img/perfumes')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'jpg,png')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\..\public\img\perfumes'))
                ->addFilter(new My_Filter_File_Resize(array(
                    'width' => 400,
                    'height' => 400,
                    'keepRatio' => true,
                    'keepSmaller' => true
        )));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class'=>'btn btn-success btn-lg'));
        
        $this->addElements(array($id,$nombre,$descripcion,$precio,$categoria,$upload,$submit));
    }


}

