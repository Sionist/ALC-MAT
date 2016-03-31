<?php

class TipocontratoController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $tipo=TipoContrat::Find();
		$this->view->SetParamToView("tipo",$tipo);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$tipo = new TipoContrat();
			$tipo->SetContrato($this->request->getpost("tipo"));

			if (!$tipo->save()) {
                foreach ($tipo->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-contrato");
                $this->view->disable();
            }

            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
            $this->response->redirect("tipos-contrato");
            $this->view->disable();
		}
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $tipo = TipoContrat::findFirstByIdContrato($id);
            if (!$tipo) {
                $this->flashSession->error("Tipo Contrato No Fue Encontrado");
                $this->response->redirect("tipos-contrato");
                $this->view->disable();
            }
            $this->view->id = $tipo->id_contrato;
            $this->tag->setDefault("id", $tipo->getIdContrato());
            $this->tag->setDefault("tipo", $tipo->getContrato());
        }
	}

	
    public function editadoAction()
    {
        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $tipo = TipoContrat::findFirstByIdContrato($id);
            if (!$tipo) {
                $this->flashSession->error("Tipo de Contrato No Existe " . $id);
                $this->response->redirect("tipos-contrato");
                $this->view->disable();
            }

            $tipo->setContrato($this->request->getPost("tipo"));

            if (!$tipo->save()) {

                foreach ($tipo->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-contrato");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tipos-contrato");
                $this->view->disable();
            }
        }

    }
}

