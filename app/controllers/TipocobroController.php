<?php

class TipocobroController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $cobro=TipoCobro::Find();
		$this->view->SetParamToView("cobro",$cobro);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$cobro = new TipoCobro();
			$cobro->setNbCobro($this->request->getpost("cobro"));
			
			if (!$cobro->save()) {
                foreach ($cobro->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-cobro");
                $this->view->disable();
            }
			
		}
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("tipos-cobro");
        $this->view->disable();
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $cobro = TipoCobro::findFirstByIdCobro($id);
            if (!$cobro) {
                $this->flashSession->error("Tipo de Cobro No Fue Encontrado");
                $this->response->redirect("tipos-cobro");
                $this->view->disable();
            }
            $this->view->id = $cobro->id_cobro;
            $this->tag->setDefault("id", $cobro->getIdCobro());
            $this->tag->setDefault("cobro", $cobro->getNbCobro());
        }
	}

	
public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");
            $cobro = TipoCobro::findFirstByIdCobro($id);

            if (!$cobro) {
                $this->flashSession->error("Tipo de Cobro No Existe " . $id);
                $this->response->redirect("tipos-cobro");
                $this->view->disable();
            }

            $cobro->setNbCobro($this->request->getPost("cobro"));

            if (!$cobro->save()) {

                foreach ($cobro->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-cobro");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tipos-cobro");
                $this->view->disable();
            }
        }
    }  
}

