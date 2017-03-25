<?php

class Administracion_Form_AcercaDe extends Zend_Form
{

    public function init()
    {
        $this->setName('Hacerca de');
        $id = new Zend_Form_Element_Hidden('id');
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Titulo')->setAttribs(array('class'=> 'input-sm'));
        
        $contenido = new Zend_Form_Element_Textarea('contenido');
        $contenido->setLabel('Contenido')->setAttribs(array('class'=> 'input-sm',
                                                            'rows'=>10));
        
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
        
        $this->addElements(array($id,$titulo,$contenido,$submit));
    }


}

