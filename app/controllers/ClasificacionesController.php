<?php

class ClasificacionesController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
	
    public function indexAction()
    {
	    
		/*$query  = new Phalcon\Mvc\Model\Query("SELECT Convenciones.id_convencion,Convenciones.descripcion,Clausulas.id_clausula,Clausulas.nclausula,Clausulas.clausula,Clasificaciones.id_clasi,Clasificaciones.minimo,Clasificaciones.maximo,Clasificaciones.tiempo,Clasificaciones.monto FROM Convenciones,Clausulas,Clasificaciones WHERE Convenciones.id_convencion=Clausulas.id_convension", $this->getDI());*/

		$query2 = new Phalcon\Mvc\Model\Query("SELECT Convenciones.*,Clausulas.*,Clasificaciones.* FROM Convenciones,Clausulas,Clasificaciones WHERE Convenciones.id_convencion=Clausulas.id_convension and Clausulas.id_clausula=Clasificaciones.id_clausula", $this->getDI());
		
		/*$query2 = "SELECT Convenciones.*,Clausulas.*,Clasificaciones.* FROM Convenciones,Clausulas,Clasificaciones WHERE Convenciones.id_convencion=Clausulas.id_convension and Clausulas.id_clausula=Clasificaciones.id_clausula";
		
		$query3 = new Phalcon\Mvc\Model\Query($query2,$this->getDI());*/

		$clasificaciones = $query2->execute();

		
		/*$phql = "SELECT Cars.*, Brands.* FROM Cars, Brands WHERE Brands.id = Cars.brands_id";
		$rows = $manager->executeQuery($phql);*/

		$this->view->setParamToView("clasificaciones", $clasificaciones);

		//$bandera=0;
		
		$this->view->bandera="0";

    }

	public function guardarAction()
	{
	   	if ($this->request->isPost())
		{
			$clasificaciones = new Clasificaciones();
			
			$clasificaciones->setIdClausula($this->request->getPost("clausu"));
			$clasificaciones->setMinimo($this->request->getPost("minimo"));
			$clasificaciones->setMaximo($this->request->getPost("maximo"));
			$clasificaciones->setTiempo($this->request->getPost("tiempo"));			
			$clasificaciones->setMonto($this->request->getPost("monto"));
			
			if (!$clasificaciones->save()) {
                foreach ($clasificaciones->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "clasificaciones",
                    "action" => "index"
                ));
            }
			
			$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
			return $this->dispatcher->forward(array(
				"controller" => "clasificaciones",
				"action" => "index"
			));
		}	
		
		
	}
	
	
	public function getClasificaAction()
		
	{
	
		$this->view->disable();
	
		$convencion = $this->request->get("convenciones");
		
		$query = new Phalcon\Mvc\Model\Query("SELECT clausulas.id_clausula, clausulas.clausula FROM convenciones,clausulas WHERE convenciones.id_convencion=clausulas.id_convension AND convenciones.id_convencion=".$convencion." ORDER BY clausulas.id_clausula ASC", $this->getDI()); 
		/*$query = new Phalcon\Mvc\Model\Query("SELECT convenciones.id_convencion,convenciones.descripcion, clausulas.id_clausula,clausulas.clausula FROM convenciones,clausulas WHERE convenciones.id_convencion=clausulas.id_convension AND convenciones.id_convencion=".$convencion." ORDER BY clausulas.id_clasula ASC", $this->getDI()); */
	
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
		

		
	}


	public function getMuestraAction()
		
	{
	
		$this->view->disable();

		$clasi = $this->request->get("clasi");

		$query = new Phalcon\Mvc\Model\Query("SELECT clasificaciones.id_clasi,clasificaciones.minimo,clasificaciones.maximo,clasificaciones.tiempo,clasificaciones.monto,clausulas.nclausula,clausulas.clausula FROM clausulas,clasificaciones WHERE clausulas.id_clausula=clasificaciones.id_clausula AND clausulas.id_clausula=".$clasi, $this->getDI()); 
	
		$clasificaciones = $query->execute();

		$row = array();
	
		foreach($clasificaciones as $ciudad)
		{
			array_push($row,$ciudad);
		}

		$this->response->setJsonContent(array(
			"ciud" => $row
			));
		$this->response->setStatusCode(200, "OK");
		$this->response->send();

        //$this->view->setVar("clasificaciones",$clasificaciones);


		//$this->view->setParamToView("clasificaciones",$clasificaciones);

		

		
	}

	
	public function editarAction($id)
	{
		
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

