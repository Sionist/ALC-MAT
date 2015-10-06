<?php

class BancosController extends \Phalcon\Mvc\Controller
{

     public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$banco=NbBancos::Find();
		$this->view->SetParamToView("banco",$banco);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$banco = new NbBancos();
			$banco->setNbBancos($this->request->getpost("banco"));
			
			if (!$banco->save()) {
                foreach ($banco->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "bancos",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "bancos",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
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
           
            /*Idniveldinst*/
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bancos",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $banco = NbBancos::findFirstByIdBancos($id);
        if (!$banco) {
            $this->flash->error("Banco No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "bancos",
                "action" => "index"
            ));
        }

        $banco->setNbBancos($this->request->getPost("banco"));
                

        if (!$banco->save()) {

            foreach ($banco->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bancos",
                "action" => "editar",
                "params" => array($banco->id_bancos)
            ));
        }

       $this->flash->success("Banco Actualizado");

       return $this->response->redirect('bancos/index');

    }

}

