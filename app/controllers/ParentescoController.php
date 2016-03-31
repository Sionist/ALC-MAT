<?php

class ParentescoController extends \Phalcon\Mvc\Controller
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
		$parentesco = Parentesco::find();
        $this->view->setParamToView("parentesco", $parentesco);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $parentesco = new Parentesco();
            $parentesco->setParentesco($this->request->getPost("parentesco"));

            if (!$parentesco->save()) {
                foreach ($parentesco->getMessages() as $message) {
                    $this->flash->error($message);
                }
                $this->response->redirect("parentesco");
                $this->view->disable();
            }
        }
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("parentesco");
        $this->view->disable();
    }
	
	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $parentesco = Parentesco::findFirstByIdParentesco($id);
            if (!$parentesco) {
                $this->flashSession->error("Parentesco No Encontrado");
                $this->response->redirect("parentesco");
                $this->view->disable();
            }
            $this->view->id = $parentesco->id_parentesco;
            $this->tag->setDefault("id", $parentesco->getIdParentesco());
            $this->tag->setDefault("parentesco", $parentesco->getParentesco());
        }
	}

	
    public function editadoAction()
    {

        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");
            $parentesco = Parentesco::findFirstByIdParentesco($id);

            if (!$parentesco) {
                $this->flashSession->error("Parentesco No Existe " . $id);
                $this->response->redirect("parentesco");
                $this->view->disable();
            }

            $parentesco->setParentesco($this->request->getPost("parentesco"));

            if (!$parentesco->save()) {

                foreach ($parentesco->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("parentesco");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("parentesco");
                $this->view->disable();
            }
        }

    }

}

