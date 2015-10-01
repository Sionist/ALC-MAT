<?php

class NivelcargoController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$nivel=NivelCargo::Find();
		$this->view->SetParamToView("nivel",$nivel);
    }



	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$nivel = new NivelCargo();
			$nivel->SetNivelCargo($this->request->getpost("nivel"));
			
			if (!$nivel->save()) {
                foreach ($nivel->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "nivel",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "nivelcargo",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $nivel = NivelCargo::findFirstByIdNivelcargo($id);
            if (!$nivel) {
                $this->flash->error("Nivel de Cargo No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "nivelcargo",
                    "action" => "index"
                ));
            }

            $this->view->id = $nivel->id_nivelcargo;

            $this->tag->setDefault("id", $nivel->getIdNivelcargo());
            $this->tag->setDefault("nivel", $nivel->getNivelcargo());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "nivel",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $nivel = NivelCargo::findFirstByIdNivelcargo($id);
        if (!$nivel) {
            $this->flash->error("Nivel de Cargo No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "nivelcargo",
                "action" => "index"
            ));
        }

        $nivel->setNivelcargo($this->request->getPost("nivel"));
        

        if (!$nivel->save()) {

            foreach ($nivel->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "nivelcargo",
                "action" => "editar",
                "params" => array($nivel->id_nivelcargo)
            ));
        }

        $this->flash->success("Nivel de Cargo Actualizado");

       return $this->response->redirect('nivelcargo/index');

    }

}

