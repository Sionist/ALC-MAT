<?php

class FrecuenciaController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $frecuencia=Frecuencia::Find();
		$this->view->SetParamToView("frecuencia",$frecuencia);
    }



	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$frecuencia = new Frecuencia();
			$frecuencia->SetFrecuencia($this->request->getpost("frecuencia"));
			
			if (!$frecuencia->save()) {
                foreach ($frecuencia->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("frecuencias");
                $this->view->disable();
            }
			
		}
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("frecuencias");
        $this->view->disable();
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $frecuencia = Frecuencia::findFirstByIdFrecuencia($id);
            if (!$frecuencia) {
                $this->flashSession->error("Frecuencia No Encontrada");
                $this->response->redirect("frecuencias");
                $this->view->disable();
            }
            $this->view->id = $frecuencia->id_frecuencia;
            $this->tag->setDefault("id", $frecuencia->getIdFrecuencia());
            $this->tag->setDefault("frecuencia", $frecuencia->getFrecuencia());
        }
	}

	
    public function editadoAction()
    {
        if (!$this->request->isPost()) {

            $id = $this->request->getPost("id");

            $frecuencia = Frecuencia::findFirstByIdFrecuencia($id);

            if (!$frecuencia) {
                $this->flashSession->error("Frecuencia No Existe " . $id);
                $this->response->redirect("frecuencias");
                $this->view->disable();
            }

            $frecuencia->setFrecuencia($this->request->getPost("frecuencia"));

            if (!$frecuencia->save()) {
                foreach ($frecuencia->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("frecuencias");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("frecuencias");
                $this->view->disable();
            }
        }
    }

}

