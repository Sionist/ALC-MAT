<?php

class DireccionesAlcaldiaController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    public function indexAction()
    {
		$direcciones = NbDireciones::find();
        $this->view->setParamToView("sector", $direcciones);
		$this->view->setParamToView("direccion", $direcciones);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $direccion = new NbDireciones();
            $direccion->setSecProAct($this->request->getPost("sector"));
			$direccion->setDenominacion($this->request->getPost("direccion"));
			
			

            if (!$direccion->save()) {
                foreach ($direccion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "direccionesAlcaldia",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        return $this->dispatcher->forward(array(
            "controller" => "direcciones",
            "action" => "index"
        ));
    }
	
	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $direccion = NbDireciones::findFirstByIdDirecciones($id);
            if (!$direccion) {
                $this->flash->error("Centro Gestor No Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "direccionesAlcaldia",
                    "action" => "index"
                ));
            }

            $this->view->id = $direccion->id_direcciones;

            $this->tag->setDefault("id", $direccion->getIdDirecciones());
            $this->tag->setDefault("sector", $direccion->getSecProAct());
			$this->tag->setDefault("direccion",$direccion->getDenominacion());
        }
		
	}

	
	public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "direccionesAlcaldia",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $direccion = NbDireciones::findFirstByIdDirecciones($id);
        if (!$direccion) {
            $this->flash->error("Centro Gestor No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "direccionesAlcaldia",
                "action" => "index"
            ));
        }

        $direccion->setSecProAct($this->request->getPost("sector"));
		$direccion->setDenominacion($this->request->getPost("direccion"));
        

        if (!$direccion->save()) {

            foreach ($direccion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "direccionesAlcaldia",
                "action" => "editar",
                "params" => array($direccion->id_direcciones)
            ));
        }

		//$this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Centro Gestor Actualizado</strong></p></div>");
        //$this->flash->success("Centro Gestor Actualizado");

       return $this->response->redirect('direccionesAlcaldia/index');

    }

}

