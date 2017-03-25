<?php

class Administracion_Form_CambiarImagen extends Zend_Form
{

    public function init()
    {
        $this->setName('cambiarImagenPerfume');
        $id = new Zend_Form_Element_Hidden('id');
        
        
        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Elegir Imagen')
                ->setRequired()
                ->setDestination(APPLICATION_PATH . '/../public/img/articulosvarios')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'jpg,png')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\..\public\img\articulosvarios'))
                ->addFilter(new My_Filter_File_Resize(array(
                    'width' => 400,
                    'height' => 400,
                    'keepRatio' => true,
                    'keepSmaller' => true
        )));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttribs(array('class'=>'btn btn-success btn-lg'));
        
        $this->addElements(array($id,$upload,$submit));
    }


}

