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
	    
		$query2 = new Phalcon\Mvc\Model\Query("SELECT Convenciones.*,Clausulas.*,Clasificaciones.* FROM Convenciones,Clausulas,Clasificaciones WHERE Convenciones.id_convencion=Clausulas.id_convension and Clausulas.id_clausula=Clasificaciones.id_clausula", $this->getDI());

		$clasificaciones = $query2->execute();

		$this->view->setParamToView("clasificaciones", $clasificaciones);

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
			"clasi" => $row
			));
		$this->response->setStatusCode(200, "OK");
		$this->response->send();
		
	}

	
	public function editarAction($id)
	{
		
		if (!$this->request->isPost())
		{
			$clasificaciones = Clasificaciones::findFirstByIdClasi($id);
			if (!$clasificaciones) {
                $this->flash->error("Clasificación No Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "clasificaciones",
                    "action" => "index"
                ));
            }
			
			
			$idclausu = $clasificaciones->id_clausula;


			$clausulas = Clausulas::findFirstByIdClausula($idclausu);
			if (!$clausulas) {
                $this->flash->error("Clausula No Encontrada Para Modificar");

                return $this->dispatcher->forward(array(
                    "controller" => "clasificaciones",
                    "action" => "index"
                ));
            }			

            $idcon    = $clausulas->id_convension;
            $clausula = $clausulas->clausula;

			$convencion = Convenciones::findFirstByIdConvencion($idcon);
			if (!$convencion) {
                $this->flash->error("Convención No Encontrada Para Modificar");

                return $this->dispatcher->forward(array(
                    "controller" => "clasificaciones",
                    "action" => "index"
                ));
            }			
			
			$this->view->id = $clasificaciones->id_clasi;

			
			$des = $convencion->descripcion;
			$this->view->des  = $des;
			$this->view->clau = $clausula;			
			
			//$this->view->id = $clausula->id_clausula;
			
			$this->tag->setDefault("id",$clasificaciones->getIdClasi());
			$this->tag->setDefault("minimo",$clasificaciones->getMinimo());
			$this->tag->setDefault("maximo",$clasificaciones->getMaximo());			
			$this->tag->setDefault("tiempo",$clasificaciones->getTiempo());			
			$this->tag->setDefault("monto",$clasificaciones->getMonto());			
			
		}
		
		
	}

	
	public function editadoAction()
	{
		if (!$this->request->isPost())
		{
			return $this->dispatcher->forward(array(
				"controller" => "clasificaciones",
				"action" => "index"));
		}		
		

		$id = $this->request->getPost("id");
			
		
		$clasificaciones = Clasificaciones::findFirstByIdClasi($id);

		
		
		
		if (!$clasificaciones)
		{
			echo "Clasificación No Encontrada en Action Editado".$id;
			return $this->dispatcher->forward(array(
				"controller" => "clasificaciones",
				"action" => "index"));
		}
				

		$clasificaciones->setMinimo($this->request->getPost("minimo"));
		$clasificaciones->setMaximo($this->request->getPost("maximo"));			
		$clasificaciones->setTiempo($this->request->getPost("tiempo"));
		$clasificaciones->setMonto($this->request->getPost("monto"));
			
		if (!$clasificaciones->save())
		{
			foreach ($clasificaciones->getMessages as $mensaje)
			{
				$this->flash->error($mensaje);
			}
				
			return $this->dispatcher->forward(array(
				"controller" => "clasificaciones",
				"action" => "index"));
		}
			
		$this->flash->success("Escala Actualizada Exitosamente");
		
		/*return $this->response->redirect("clausulas","index");*/
		
	}
    

}

