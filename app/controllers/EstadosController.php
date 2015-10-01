<?php

class EstadosController extends \Phalcon\Mvc\Controller
{	
	
	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }

    public function indexAction()
    {
	// Aqui muestra todos los registros de la tabla discapacidad
		$estado = Estados::find();
        $this->view->setParamToView("estado", $estado);

    }
	
	

}

