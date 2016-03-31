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
        $this->verificarPermisos->verificar();

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
                    $this->flashSession->error($message);
                }
                $this->response->redirect("direcciones-alcaldia");
                $this->view->disable();
            }
        }

        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("direcciones-alcaldia");
        $this->view->disable();
    }
	
	public function editarAction($id){
        $this->verificarPermisos->verificar();

        $direccion = NbDireciones::findFirstByIdDirecciones($id);

        if (!$direccion) {
            $this->flashSession->error("Centro Gestor No Encontrado");
            $this->response->redirect("direcciones-alcaldia");
            $this->view->disable();
        }else {
            $this->view->id = $direccion->id_direcciones;
            $this->tag->setDefault("id", $direccion->getIdDirecciones());
            $this->tag->setDefault("sector", $direccion->getSecProAct());
            $this->tag->setDefault("direccion", $direccion->getDenominacion());
        }

	}

	
	public function editadoAction()
    {

        if ($this->request->isPost()){

            $id = $this->request->getPost("id");

            $direccion = NbDireciones::findFirstByIdDirecciones($id);

            if (!$direccion) {
                $this->flash->error("Centro Gestor No Existe " . $id);

                $this->response->redirect("direcciones-alcaldia");
                $this->view->disable();
            }else {
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
                }else{
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("direcciones-alcaldia");
                    $this->view->disable();
                }

            }
        }

    }

}

