<?php

class TipocuentaController extends \Phalcon\Mvc\Controller
{

     public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $cuenta=TipoCuent::Find();
		$this->view->SetParamToView("cuenta",$cuenta);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$cuenta = new TipoCuent();
			$cuenta->setTipoCuenta($this->request->getpost("cuenta"));
			
			if (!$cuenta->save()) {
                foreach ($cuenta->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-cuentas");
                $this->view->disable();
            }
			
		}
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("tipos-cuentas");
        $this->view->disable();
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $cuenta = TipoCuent::findFirstByIdTipocuent($id);
            if (!$cuenta) {
                $this->flashSession->error("Cuenta No Fue Encontrada");
                $this->response->redirect("tipos-cuentas");
                $this->view->disable();
            }
            $this->view->id = $cuenta->id_tipocuent;
            $this->tag->setDefault("id", $cuenta->getIdTipocuent());
            $this->tag->setDefault("cuenta", $cuenta->getTipoCuenta());
        }
	}

	
    public function editadoAction()
    {
        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $cuenta = TipoCuent::findFirstByIdTipocuent($id);
            if (!$cuenta) {
                $this->flashSession->error("Cuenta No Existe " . $id);
                $this->response->redirect("tipos-cuentas");
                $this->view->disable();
            }

            $cuenta->setTipoCuenta($this->request->getPost("cuenta"));


            if (!$cuenta->save()) {

                foreach ($cuenta->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-cuentas");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tipos-cuentas");
                $this->view->disable();
            }
        }
    }
}

