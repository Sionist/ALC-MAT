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
        $this->verificarPermisos->verificar();

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
                    $this->flashSession->error($message);
                }
                $this->response->redirect("cargos");
                $this->view->disable();
            }
			
		}
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("cargos");
        $this->view->disable();
	}	

		public function editarAction($id) {
            $this->verificarPermisos->verificar();

            if (!$this->request->isPost()) {

            $cargo = Cargos::findFirstByIdCargo($id);
            if (!$cargo) {
                $this->flashSession->error("Cargo No Fue Encontrado");
                $this->response->redirect("asignaciones/index");
                $this->view->disable();
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
                $this->response->redirect("cargos");
                $this->view->disable();
        }
   
        $id = $this->request->getPost("id");
		
        $cargo = Cargos::findFirstByIdCargo($id);
        if (!$cargo) {
            $this->flashSession->error("Cargo No Existe " . $id);
            $this->response->redirect("cargos");
            $this->view->disable();
        }

        $cargo->setCargo($this->request->getPost("cargo"));
        $cargo->setSueldo($this->request->getPost("sueldo"));
		$cargo->setNivel($this->request->getPost("combonivel"));

        if (!$cargo->save()) {

            foreach ($cargo->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            $this->response->redirect("asignaciones/index/$cargo->id_cargo");
            $this->view->disable();
        }else {
            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
            $this->response->redirect("cargos");
            $this->view->disable();
        }

    }


}

