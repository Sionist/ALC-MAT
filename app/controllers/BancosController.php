<?php

class BancosController extends \Phalcon\Mvc\Controller
{

     public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $banco = NbBancos::Find();
		$this->view->SetParamToView("banco",$banco);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$banco = new NbBancos();
			$banco->setNbBancos($this->request->getPost("banco"));
			
			if (!$banco->save()) {
                foreach ($banco->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("bancos");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect("bancos");
                $this->view->disable();
            }
			
		}
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $banco = NbBancos::findFirstByIdBancos($id);
            if (!$banco) {
                $this->flash->error("Banco No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "bancos",
                    "action" => "index"
                ));
            }

            $this->view->id = $banco->id_bancos;

            $this->tag->setDefault("id", $banco->getIdBancos());
            $this->tag->setDefault("banco", $banco->getNbBancos());

        }
		
	}

	
    public function editadoAction()
    {
        if (!$this->request->isPost()) {
            $this->response->redirect("bancos");
            $this->view->disable();
        }
   
        $id = $this->request->getPost("id");

        $banco = NbBancos::findFirstByIdBancos($id);
        if (!$banco) {
            $this->flashSession->error("Banco No Existe " . $id);
            $this->response->redirect("bancos");
            $this->view->disable();
        }

        $banco->setNbBancos($this->request->getPost("banco"));
                

        if (!$banco->save()) {

            foreach ($banco->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            $this->response->redirect("bancos/editar/".$banco->id_banco);
            $this->view->disable();
        }
        $this->flashSession->error("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Banco Actualizado</strong></p></div>");
        $this->response->redirect("bancos");
        $this->view->disable();
    }

}

