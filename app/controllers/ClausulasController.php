<?php

class ClausulasController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
	
    public function indexAction()
    {
		$this->verificarPermisos->verificar();

		$query = new Phalcon\Mvc\Model\Query("SELECT convenciones.id_convencion,convenciones.descripcion,clausulas.id_clausula,clausulas.nclausula,clausulas.id_convension,clausulas.clausula,clausulas.activa,clausulas.observacion FROM convenciones,clausulas WHERE convenciones.id_convencion=clausulas.id_convension ORDER BY convenciones.id_convencion ASC", $this->getDI()); 
	
		$clausulas = $query->execute();
		
		
		$this->view->setParamToView("clausulas", $clausulas);
    }

	public function guardarAction()
	{
	   	if ($this->request->isPost())
		{
			$clausulas = new Clausulas();
			
			$clausulas->setIdConvension($this->request->getPost("clausu"));
			$clausulas->setNclausula($this->request->getPost("nclausula"));
			$clausulas->setClausula($this->request->getPost("clausula"));
			$clausulas->setActiva($this->request->getPost("activa"));			
			$clausulas->setObservacion($this->request->getPost("observa"));
			
			if (!$clausulas->save()) {
                foreach ($clausulas->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "clausulas",
                    "action" => "index"
                ));
            }
			
			$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
			return $this->dispatcher->forward(array(
				"controller" => "clausulas",
				"action" => "index"
			));
		}	
		
		
	}
	
	
	/*public function getDocumentosAction()
		
	{
		$this->view->disable();
	
		$estado = $this->request->get("estado");
		
		$query = new Phalcon\Mvc\Model\Query("SELECT ciudades.id_ciudad, ciudades.ciudad FROM ciudades INNER JOIN estados WHERE estados.id_estado=ciudades.id_estado AND estados.id_estado=".$estado." ORDER BY ciudades.ciudad ASC", $this->getDI()); 
	
		$ciudades = $query->execute();
		
		$row = array();
	
		foreach($ciudades as $ciudad)
		{
			array_push($row,$ciudad);
		}

		$this->response->setJsonContent(array(
			"ciud" => $row
			));
		$this->response->setStatusCode(200, "OK");
		$this->response->send();
		
		
	}*/

	
	public function editarAction($id)
	{
		$this->verificarPermisos->verificar();

		if (!$this->request->isPost())
		{
			$clausula = Clausulas::findFirstByIdClausula($id);
			if (!$clausula) {
                $this->flash->error("Clausula No Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "clausulas",
                    "action" => "index"
                ));
            }
			
			
			$conven = $clausula->id_convension;
			
					
			$convencion = Convenciones::findFirstByIdConvencion($conven);
			if (!$convencion) {
                $this->flash->error("Convención No Encontrada Para Modificar");

                return $this->dispatcher->forward(array(
                    "controller" => "clausulas",
                    "action" => "index"
                ));
            }			
			
			$this->view->id = $clausula->id_clausula;

			
			$des = $convencion->descripcion;
			$this->view->des = $des;			
			
			$this->view->id = $clausula->id_clausula;
			
			$this->tag->setDefault("id",$clausula->getIdClausula());
			$this->tag->setDefault("clausula",$clausula->getClausula());
			$this->tag->setDefault("activa",$clausula->getActiva());			
			$this->tag->setDefault("observa",$clausula->getObservacion());			
			
		}
		
		
	}

	
	public function editadoAction()
	{
		if (!$this->request->isPost())
		{
			return $this->dispatcher->forward(array(
				"controller" => "clausulas",
				"action" => "index"));
		}		
		

		$id = $this->request->getPost("id");
			
		
		$clausula = Clausulas::findFirstByIdClausula($id);

		
		
		
		if (!$clausula)
		{
			echo "Clausula No Encontrada en Action Editado".$id;
			return $this->dispatcher->forward(array(
				"controller" => "clausulas",
				"action" => "index"));
		}
				
		
		$clausula->setClausula($this->request->getPost("clausula"));
		$clausula->setActiva($this->request->getPost("activa"));			
		$clausula->setObservacion($this->request->getPost("observa"));
			
		if (!$clausula->save())
		{
			foreach ($clausula->getMessages as $mensaje)
			{
				$this->flash->error($mensaje);
			}
				
			return $this->dispatcher->forward(array(
				"controller" => "clausulas",
				"action" => "index"));
		}
			
		$this->flash->success("Clausula Actualizada Exitosamente");
		
		/*return $this->response->redirect("clausulas","index");*/
		
	}

}

