<?php

class CiudadesController extends \Phalcon\Mvc\Controller
{
	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
	
    public function indexAction()
    {
		$this->verificarPermisos->verificar();

			//$ciudades = Ciudades::find();
		$query = new Phalcon\Mvc\Model\Query("SELECT estados.estado, ciudades.ciudad FROM estados INNER JOIN ciudades WHERE estados.id_estado=ciudades.id_estado ORDER BY estados.estado ASC", $this->getDI());

		$ciudades = $query->execute();


		$this->view->setParamToView("ciudad", $ciudades);
    }

	
	public function getCiudadesAction()	
	{
	  $this->view->disable();
	
	  $estado = $this->request->get("estado");
	  
	  /*echo "este es el id del estado ".$estado;*/
		
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

		
	}

	public function editarAction($ciudad)
	{
		$this->verificarPermisos->verificar();

		if (!$this->request->isPost()) {

            $ciudad = Ciudades::findFirstByCiudad($ciudad);
            if (!$ciudad) {
                $this->flashSession->error("Ciudad No Encontrada");
				$this->response->redirect("ciudades");
				$this->view->disable();
            }

            $this->view->id = $ciudad->ciudad;

            $this->tag->setDefault("id", $ciudad->getCiudad());
            $this->tag->setDefault("ciudad", $ciudad->getCiudad());
        }
		
	}
	
}

