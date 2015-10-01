<?php

class TipocuentaController extends \Phalcon\Mvc\Controller
{

     public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
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
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "tipocuenta",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "tipocuenta",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $cuenta = TipoCuent::findFirstByIdTipocuent($id);
            if (!$cuenta) {
                $this->flash->error("Cuenta No Fue Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "cuenta",
                    "action" => "index"
                ));
            }

            $this->view->id = $cuenta->id_tipocuent;

            $this->tag->setDefault("id", $cuenta->getIdTipocuent());
            $this->tag->setDefault("cuenta", $cuenta->getTipoCuenta());
           
            /*Idniveldinst*/
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipocuenta",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $cuenta = TipoCuent::findFirstByIdTipocuent($id);
        if (!$cuenta) {
            $this->flash->error("Cuenta No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tipocuenta",
                "action" => "index"
            ));
        }

        $cuenta->setTipoCuenta($this->request->getPost("cuenta"));
                

        if (!$cuenta->save()) {

            foreach ($cuenta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "cuenta",
                "action" => "editar",
                "params" => array($cuenta->id_tipocuent)
            ));
        }

        $this->flash->success("Cuenta Actualizada");

       return $this->response->redirect('tipocuenta/index');

    }

}

