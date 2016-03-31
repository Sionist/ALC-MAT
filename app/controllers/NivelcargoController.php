<?php

class NivelcargoController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $nivel=NivelCargo::Find();
		$this->view->SetParamToView("nivel",$nivel);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$nivel = new NivelCargo();
			$nivel->SetNivelCargo($this->request->getpost("nivel"));
			
			if (!$nivel->save()) {
                foreach ($nivel->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("niveles-cargos");
                $this->view->disable();
            }

            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
            $this->response->redirect("niveles-cargos");
            $this->view->disable();
        }
	}

	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $nivel = NivelCargo::findFirstByIdNivelcargo($id);
            if (!$nivel) {
                $this->flashSession->error("Nivel de Cargo No Fue Encontrado");
                $this->response->redirect("niveles-cargos");
                $this->view->disable();
            }
            $this->view->id = $nivel->id_nivelcargo;
            $this->tag->setDefault("id", $nivel->getIdNivelcargo());
            $this->tag->setDefault("nivel", $nivel->getNivelcargo());
        }
	}

    public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");
            $nivel = NivelCargo::findFirstByIdNivelcargo($id);

            if (!$nivel) {
                $this->flashSession->error("Nivel de Cargo No Existe " . $id);
                $this->response->redirect("niveles-cargos");
                $this->view->disable();
            } else {

                $nivel->setNivelcargo($this->request->getPost("nivel"));

                if (!$nivel->save()) {
                    foreach ($nivel->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                    $this->response->redirect("niveles-cargos");
                    $this->view->disable();
                } else {
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("niveles-cargos");
                    $this->view->disable();
                }
            }
        }
    }

}

