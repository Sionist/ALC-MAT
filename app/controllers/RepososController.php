<?php

class RepososController extends \Phalcon\Mvc\Controller


{

    public function initialize()
    {
    	$this->view->setTemplateAfter('blank'); 
    }


    public function indexAction($nu_cedula)
	{
		
		
		$dtrab = Datospersonales::findFirstByNuCedula($nu_cedula);

		$nombre1 = $dtrab->nombre1;
		$apellido1 = $dtrab->apellido1;
		
		
		$this->tag->setDefault("ncedula",$nu_cedula);
		

		$this->view->nombre1 = $nombre1;
		$this->view->apellido1 = $apellido1;
		$this->view->nu_cedula = $nu_cedula;

		


		$query = new Phalcon\Mvc\Model\Query("Select * from NbReposo where nu_cedula=".$nu_cedula."Order by id_reposo",$this->getDI());
        
		$reposos = $query->execute();

		
		$this->view->SetParamToView("reposos",$reposos);
		

    }


	public function guardarAction()
    {
    	
        if ($this->request->isPost()) {

            $reposo = new NbReposo();

            $ncedula = $this->request->getPost("ncedula");

            $reposo->setNuCedula($this->request->getPost("ncedula"));
            $reposo->setFInicio($this->request->getPost("fechainicio"));
            $reposo->setFFinal($this->request->getPost("fechafinal"));
            $reposo->setDiagnostico($this->request->getPost("diagnostico"));


            if (!$reposo->save()) {
                foreach ($reposo->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "reposos",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        return $this->dispatcher->forward(array(
            "controller" => "reposos",
            "action" => "index",
            "params" => array($ncedula)
        ));
    }


    public function editarAction($idreposo)
    {
    	
    	if (!$this->request->isPost())
    	{
    		
    	   	$reposo = NbReposo::findFirstByIdReposo($idreposo);


    	   	$ncedula = $reposo->nu_cedula;
			$dtrab = Datospersonales::findFirstByNuCedula($ncedula);     		

    		if (!$reposo)
    		{
				$this->flash->error("Reposo NO Encontrado");
				
				return $this->dispatcher->forward(array(
					"controller" => "reposos",
					"action" => "index",
					"params" => array($ncedula)
				));				    		
    		}

    		$this->view->nombre1 = $dtrab->nombre1;
    		$this->view->apellido1 = $dtrab->apellido1;

    		$this->view->idreposo = $reposo->id_reposo;
    		$this->view->ncedula = $reposo->nu_cedula;

    		$this->tag->setDefault("idreposo",$reposo->getIdReposo());
    		$this->tag->setDefault("ncedula",$reposo->getNuCedula());
    		$this->tag->setDefault("finicio",$reposo->getFInicio());
    		$this->tag->setDefault("ffinal",$reposo->getFFinal());
    		$this->tag->setDefault("diagnostico",$reposo->getDiagnostico());

    	}	
    }

    public function editadoAction()
    {
    	if ($this->request->isPost())
    	{

    		$idreposo = $this->request->getPost("idreposo");
    		$ncedula = $this->request->getPost("ncedula");

    		$reposo = Nbreposo::findFirstByIdReposo($idreposo);

    		if (!$reposo)
    		{
    			$this->flash->error("Reposo NO Encontrado");
    			return $this->dispatcher->forward(array("controller" => "reposos",
    				"action" => "index",
    				"params" => array($ncedula)));
    		}

    		$reposo->setFInicio($this->request->getPost("finicio"));
    		$reposo->setFFinal($this->request->getPost("ffinal"));
    		$reposo->setDiagnostico($this->request->getPost("diagnostico"));

    		if (!$reposo->save())
    		{
    			foreach ($reposo->getMessages() as $message) {
                    $this->flash->error($message);
                }	

                return $this->dispatcher->forward(array("controller" => "reposos",
                    "action" => "index",
                    "params" => array($ncedula)
                 ));
    		}

    		$this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Modificación Exitosa</strong></p></div>");
    		return $this->dispatcher->forward(array("controller" => "reposos", "action" => "index", "params" => array($ncedula)));

    	}
    }

}

