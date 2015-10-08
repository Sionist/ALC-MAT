<?php

class AsigsdeducstrabajadorController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }
    public function indexAction()
    {
        $asignaciones = NbAsignaciones::find();
        $deducciones = NbDeducciones::find();

        $this->view->setParamToView("asignaciones", $asignaciones);
        $this->view->setParamToView("deducciones", $deducciones);
    }

}

