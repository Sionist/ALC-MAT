<?php

class TiponominaController extends \Phalcon\Mvc\Controller
{

	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }

    
	public function indexAction()
	{
		
		$query = new Phalcon\Mvc\Model\Query("SELECT Frecuencia.frecuencia as frecuenc, TipoNomi.nomina, TipoNomi.id_nomina, TipoNomi.frecuencia  FROM Frecuencia INNER JOIN TipoNomi where Frecuencia.id_frecuencia=TipoNomi.frecuencia", $this->getDI());
		$query2 = new Phalcon\Mvc\Model\Query("SELECT * FROM Frecuencia", $this->getDI());

		//echo var_dump($query);

		$tiponomi=$query->execute();
		$frecuen=$query2->execute();
		
		/*$tiponomi=TipoNomi::Find();*/
		
		$this->view->SetParamToView("tiponomi",$tiponomi);
		$this->view->SetParamToView("frecuencia",$frecuen);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$tiponomi = new TipoNomi();
			$tiponomi->setNomina($this->request->getpost("tiponomi"));
			$tiponomi->setFrecuencia($this->request->getpost("frecuencia"));
			
			if (!$tiponomi->save()) {
                foreach ($tiponomi->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "tiponomina",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "tiponomina",
            "action" => "index"
        ));
		
		
	}	

		public function editarAction($id) {
        if (!$this->request->isPost()) {

            $tiponomi = TipoNomi::findFirstByIdNomina($id);
            if (!$tiponomi) {
                $this->flash->error("Tipo de Nómina No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "tiponomina",
                    "action" => "index"
                ));
            }

            $this->view->id = $tiponomi->id_nomina;
			$this->view->idfre = $tiponomi->frecuencia;
			
            $this->tag->setDefault("id", $tiponomi->getIdNomina());
            $this->tag->setDefault("tiponomi", $tiponomi->getNomina());
			$this->tag->setDefault("frecuencia", $tiponomi->getFrecuencia());
			
			
			/*$vfre = Frecuencia::findFirstByIdFrecuencia($id);
            if (!$vfre) {
                $this->flash->error("Frecuencia No Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "tiponomina",
                    "action" => "index"
                ));
            }
            
			$this->view->frecuencias = $vfre->frecuencia;
			/*$this->tag->setDefault("frecuencia", $vfre->getFrecuencia());*/
            
        }
		
	}

	
		public function editadoAction()
		{

			if (!$this->request->isPost()) {
				return $this->dispatcher->forward(array(
					"controller" => "tiponomina",
					"action" => "index"
				));
        }
   
        $id = $this->request->getPost("id");
		$idf = $this->request->getPost("idf");

        $tiponomi = TipoNomi::findFirstByIdNomina($id);
        if (!$tiponomi) {
            $this->flash->error("Tipo de Nómina No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tiponomina",
                "action" => "index"
            ));
        }

        $tiponomi->setNomina($this->request->getPost("tiponomi"));
        $tiponomi->setFrecuencia($this->request->getPost("frecuencia"));

        if (!$tiponomi->save()) {

            foreach ($tiponomi->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tiponomina",
                "action" => "editar",
                "params" => array($tiponomi->id_nomina)
            ));
        }

        $this->flash->success("Tipo de Nómina Actualizado");

       return $this->response->redirect('tiponomina/index');

    }
	
}

