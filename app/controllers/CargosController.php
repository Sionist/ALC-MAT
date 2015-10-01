<?php

class CargosController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }

    
	public function indexAction()
	{
		
		$query = new Phalcon\Mvc\Model\Query("SELECT NivelCargo.nivel_cargo, Cargos.cargo,Cargos.sueldo,Cargos.id_cargo FROM NivelCargo,Cargos where NivelCargo.id_nivelcargo=Cargos.nivel", $this->getDI());
		$query2 = new Phalcon\Mvc\Model\Query("SELECT * FROM NivelCargo", $this->getDI());
		
		//echo var_dump($query);

		$cargo=$query->execute();
		$nivel=$query2->execute();
		
		
		$this->view->SetParamToView("cargo",$cargo);
		$this->view->SetParamToView("sueldo",$cargo);
		$this->view->SetParamToView("combonivel",$nivel);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$cargo = new Cargos();
			$cargo->setCargo($this->request->getpost("cargo"));
			$cargo->setSueldo($this->request->getpost("sueldo"));
			$cargo->setNivel($this->request->getpost("combonivel"));
			
			if (!$cargo->save()) {
                foreach ($cargo->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "cargos",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "cargos",
            "action" => "index"
        ));
		
		
	}	

		public function editarAction($id) {
        if (!$this->request->isPost()) {

            $cargo = Cargos::findFirstByIdCargo($id);
            if (!$cargo) {
                $this->flash->error("Cargo No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "cargos",
                    "action" => "index"
                ));
            }

            $this->view->id = $cargo->id_cargo;
			
            $this->tag->setDefault("id", $cargo->getIdCargo());
            $this->tag->setDefault("cargo", $cargo->getCargo());
			$this->tag->setDefault("sueldo",$cargo->getSueldo());
			$this->tag->setDefault("combonivel",$cargo->getNivel());
			
            
        }
		
	}

	
		public function editadoAction()
		{

			if (!$this->request->isPost()) {
				return $this->dispatcher->forward(array(
					"controller" => "cargos",
					"action" => "index"
				));
        }
   
        $id = $this->request->getPost("id");
		
        $cargo = Cargos::findFirstByIdCargo($id);
        if (!$cargo) {
            $this->flash->error("Cargo No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "cargos",
                "action" => "index"
            ));
        }

        $cargo->setCargo($this->request->getPost("cargo"));
        $cargo->setSueldo($this->request->getPost("sueldo"));
		$cargo->setNivel($this->request->getPost("combonivel"));

        if (!$cargo->save()) {

            foreach ($cargo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "cargos",
                "action" => "editar",
                "params" => array($cargo->id_cargo)
            ));
        }

        $this->flash->success("Cargo Actualizado");

       return $this->response->redirect('cargos/index');

    }


}

