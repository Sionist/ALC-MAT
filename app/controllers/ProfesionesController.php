<?php

class ProfesionesController extends \Phalcon\Mvc\Controller
{

   public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $profesion=Profesiones::Find();
		$this->view->SetParamToView("profesion",$profesion);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$profesion = new Profesiones();
			$profesion->setProfesion($this->request->getpost("profesion"));
			
			if (!$profesion->save()) {
                foreach ($profesion->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("profesiones");
                $this->view->disable();
            }
			
		}
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("profesiones");
        $this->view->disable();
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {
            $profesion = Profesiones::findFirstByIdProfesion($id);
            if (!$profesion) {
                $this->flashSession->error("Profesión No Fue Encontrada");
                $this->response->redirect("profesiones");
                $this->view->disable();
            }
            $this->view->id = $profesion->id_profesion;
            $this->tag->setDefault("id", $profesion->getIdProfesion());
            $this->tag->setDefault("profesion", $profesion->getProfesion());
        }
		
	}

	
public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");

            $profesion = Profesiones::findFirstByIdProfesion($id);
            if (!$profesion) {
                $this->flashSession->error("Profesión No Existe " . $id);
                $this->response->redirect("profesiones");
                $this->view->disable();
            }

            $profesion->setProfesion($this->request->getPost("profesion"));

            if (!$profesion->save()) {

                foreach ($profesion->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("profesiones");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("profesiones");
                $this->view->disable();
            }
        }
    }
}

