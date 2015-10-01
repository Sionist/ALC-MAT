<?php

class FrecuenciaController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
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
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "frecuencia",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "frecuencia",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $frecuencia = Frecuencia::findFirstByIdFrecuencia($id);
            if (!$frecuencia) {
                $this->flash->error("Frecuencia No Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "frecuencia",
                    "action" => "index"
                ));
            }

            $this->view->id = $frecuencia->id_frecuencia;

            $this->tag->setDefault("id", $frecuencia->getIdFrecuencia());
            $this->tag->setDefault("frecuencia", $frecuencia->getFrecuencia());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "frecuencia",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $frecuencia = Frecuencia::findFirstByIdFrecuencia($id);
        if (!$frecuencia) {
            $this->flash->error("Frecuencia No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "frecuencia",
                "action" => "index"
            ));
        }

        $frecuencia->setFrecuencia($this->request->getPost("frecuencia"));
        

        if (!$frecuencia->save()) {

            foreach ($frecuencia->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "frecuencia",
                "action" => "editar",
                "params" => array($frecuencia->id_frecuencia)
            ));
        }

        $this->flash->success("Frecuencia Actualizada");

       return $this->response->redirect('frecuencia/index');

    }

}

