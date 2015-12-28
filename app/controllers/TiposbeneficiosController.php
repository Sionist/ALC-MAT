<?php

class TiposbeneficiosController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		
		$this->view->setTemplateAfter('blank');
		
	}
	
	public function indexAction()
    {
		
		$beneficio= Tiposbeneficios::find();
		
		$this->view->setParamToView("beneficio",$beneficio);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
            $beneficio = new Tiposbeneficios();
            $beneficio->setBeneficios($this->request->getPost("beneficio"));

            if (!$beneficio->save())
            {
                foreach ($beneficio->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-beneficios");
                $this->view->disable();
            }
            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
            $this->response->redirect("tipos-beneficios");
            $this->view->disable();
		}
		
	}
	
	
	public function editarAction($id)
	{
		if (!$this->request->isPost())
		{
			$beneficio = Tiposbeneficios::findFirstByIdTipobeneficio($id);
			
			if (!$beneficio) {
                $this->flashSession->error("Tipo Beneficio No Encontrado");
                $this->response->redirect("tipos-beneficios");
                $this->view->disable();
            }
			$this->view->id = $beneficio->id_tipobeneficio;
			$this->tag->setDefault("id",$beneficio->getIdTipobeneficio());
			$this->tag->setDefault("beneficio",$beneficio->getBeneficios());
		}
	}
	
	
	public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");
            $beneficio = Tiposbeneficios::findFirstByIdTipobeneficio($id);

            if (!$beneficio) {
                $this->flashSession->error("Tipo Beneficio No Existe " . $id);
                $this->response->redirect("tipos-beneficios");
                $this->view->disable();
            }

            $beneficio->setBeneficios($this->request->getPost("beneficio"));

            if (!$beneficio->save()) {

                foreach ($beneficio->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-beneficios");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tipos-beneficios");
                $this->view->disable();
            }
        }
    }
}

