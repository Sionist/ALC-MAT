<?php

class FondosController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        // Aqui muestra todos los registros de la tabla discapacidad
		$fondo = FondoDesc::find();
        $this->view->setParamToView("fondo", $fondo);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $fondo = new FondoDesc();
            $fondo->setFondo($this->request->getPost("fondo"));

            if (!$fondo->save()) {
                foreach ($fondo->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("fondos-embargos");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect("fondos-embargos");
                $this->view->disable();
            }
        }

    }
	
	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $fondo = FondoDesc::findFirstByIdFondo($id);
            if (!$fondo) {
                $this->flashSession->error("Fondo No Encontrado");
                $this->response->redirect("fondos-embargos");
                $this->view->disable();
            }
            $this->view->id = $fondo->id_fondo;
            $this->tag->setDefault("id", $fondo->getIdFondo());
            $this->tag->setDefault("fondo", $fondo->getFondo());
        }
		
	}

	
    public function editadoAction()
    {
        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $fondo = FondoDesc::findFirstByIdFondo($id);

            if (!$fondo) {
                $this->flashSession->error("Fondo No Existe " . $id);
                $this->response->redirect("fondos-embargos");
                $this->view->disable();
            }

            $fondo->setFondo($this->request->getPost("fondo"));

            if (!$fondo->save()) {

                foreach ($fondo->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("fondos-embargos");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("fondos-embargos");
                $this->view->disable();
            }
        }
    }
}

