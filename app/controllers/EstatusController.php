<?php

class EstatusController extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$estatus=EstatusT::Find();
		$this->view->SetParamToView("estatus",$estatus);
    }



	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$estatus = new EstatusT();
			$estatus->SetEstatus($this->request->getpost("estatus"));
			
			if (!$estatus->save()) {
                foreach ($estatus->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("estatus");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect("estatus");
                $this->view->disable();
            }
		}
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $estatus = EstatusT::findFirstByIdEstat($id);
            if (!$estatus) {
                $this->flashSession->error("Estatus No Fue Encontrado");
                $this->response->redirect("estatus");
                $this->view->disable();
            }
            $this->view->id = $estatus->id_estat;
            $this->tag->setDefault("id", $estatus->getIdEstat());
            $this->tag->setDefault("estatus", $estatus->getEstatus());
        }
		
	}

	
public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");

            $estatus = EstatusT::findFirstByIdEstat($id);

            if (!$estatus) {
                $this->flashSession->error("Estatus No Existe " . $id);
                $this->response->redirect("estatus");
                $this->view->disable();
            }else {

                $estatus->setEstatus($this->request->getPost("estatus"));

                if (!$estatus->save()) {

                    foreach ($estatus->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                    $this->response->redirect("discapacidades");
                    $this->view->disable();
                }else {

                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("estatus");
                    $this->view->disable();
                }
            }
        }

    }
	
	

}