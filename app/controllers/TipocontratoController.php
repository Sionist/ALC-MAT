<?php

class TipocontratoController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
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
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "tipocontrato",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "tipocontrato",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $tipo = TipoContrat::findFirstByIdContrato($id);
            if (!$tipo) {
                $this->flash->error("Tipo Contrato No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "tipocontrato",
                    "action" => "index"
                ));
            }

            $this->view->id = $tipo->id_contrato;

            $this->tag->setDefault("id", $tipo->getIdContrato());
            $this->tag->setDefault("tipo", $tipo->getContrato());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipocontrato",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $tipo = TipoContrat::findFirstByIdContrato($id);
        if (!$tipo) {
            $this->flash->error("Tipo de Contrato No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tipocontrato",
                "action" => "index"
            ));
        }

        $tipo->setContrato($this->request->getPost("tipo"));
        

        if (!$tipo->save()) {

            foreach ($tipo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipocontrato",
                "action" => "editar",
                "params" => array($tipo->id_contrato)
            ));
        }

        $this->flash->success("tipo Contrato Actualizado");

       return $this->response->redirect('tipocontrato/index');

    }
}

