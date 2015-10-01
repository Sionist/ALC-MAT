<?php

class TasasbcvController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$tasa=TasasBcv::Find();
		$this->view->SetParamToView("tasa",$tasa);
		$this->view->SetParamToView("mes",$tasa);
		$this->view->SetParamToView("yeartasa",$tasa);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$tasa = new TasasBcv();
			$tasa->setTasa($this->request->getpost("tasa"));
			$tasa->setMes($this->request->getpost("mes"));
			$tasa->setAnoTasa($this->request->getpost("yeartasa"));
			
			if (!$tasa->save()) {
                foreach ($tasa->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "tasasbcv",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "tasasbcv",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $tasa = TasasBcv::findFirstByIdTasa($id);
            if (!$tasa) {
                $this->flash->error("Tasa No Fue Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "tasasbcv",
                    "action" => "index"
                ));
            }

            $this->view->id = $tasa->id_tasa;

            $this->tag->setDefault("id", $tasa->getIdTasa());
            $this->tag->setDefault("tasa", $tasa->getTasa());
			$this->tag->setDefault("mes", $tasa->getMes());
			$this->tag->setDefault("yeartasa", $tasa->getAnoTasa());
           
            /*Idniveldinst*/
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tasasbcv",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $tasa = TasasBcv::findFirstByIdTasa($id);
        if (!$tasa) {
            $this->flash->error("Tasa No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tasasbcv",
                "action" => "index"
            ));
        }

        $tasa->setTasa($this->request->getPost("tasa"));
		$tasa->setMes($this->request->getPost("mes"));
		$tasa->setAnoTasa($this->request->getPost("yeartasa"));
                

        if (!$tasa->save()) {

            foreach ($tasa->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tasasbcv",
                "action" => "editar",
                "params" => array($tasa->id_tasa)
            ));
        }

        $this->flash->success("Tasa Actualizada");

       return $this->response->redirect('tasasbcv/index');

    }

}

