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
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "estatus",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "estatus",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $estatus = EstatusT::findFirstByIdEstat($id);
            if (!$estatus) {
                $this->flash->error("Estatus No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "estatus",
                    "action" => "index"
                ));
            }

            $this->view->id = $estatus->id_estat;

            $this->tag->setDefault("id", $estatus->getIdEstat());
            $this->tag->setDefault("estatus", $estatus->getEstatus());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "estatus",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $estatus = EstatusT::findFirstByIdEstat($id);
        if (!$estatus) {
            $this->flash->error("Estatus No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "estatus",
                "action" => "index"
            ));
        }

        $estatus->setEstatus($this->request->getPost("estatus"));
        

        if (!$estatus->save()) {

            foreach ($estatus->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "estatus",
                "action" => "editar",
                "params" => array($estatus->id_estat)
            ));
        }

        $this->flash->success("Estatus Actualizado");

       return $this->response->redirect('Estatus/index');

    }
	
	

}