<?php

class EmbargosController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}


    public function indexAction($ncedula)
    {
    	$dtrab     = DatosPersonales::findFirstByNuCedula($ncedula);
    	$nombre1   = $dtrab->nombre1;
    	$apellido1 = $dtrab->apellido1;

    	$this->tag->setDefault("ncedula",$ncedula);

    	$this->view->nombre1   = $nombre1;
    	$this->view->apellido1 = $apellido1;
    	$this->view->nu_cedula = $ncedula;

    	//$consulta = new Phalcon\Mvc\Model\Query("Select * from NbEmbargos where NbEmbargos.nu_cedula=$ncedula order by id_embargo",$this->getDI());

    	$consulta = $this->modelsManager->createBuilder()
    	->from("NbEmbargos")
    	->join("FondoDesc")
    	->columns("NbEmbargos.porcentaje_emb,NbEmbargos.num_exp,NbEmbargos.tribunal,NbEmbargos.f_emb,FondoDesc.fondo")
    	->where("NbEmbargos.nu_cedula = :ci:",array("ci"=>$ncedula))
    	->getQuery()
    	->execute();

    	//$embargos = $consulta->execute();

    	//$embargos = NbEmbargos::find(array("nu_cedula = nu_cedula", "order" => "id_embargo"));
    	
    	$this->view->SetParamToView("embargos",$consulta);
    	
    }

    public function guardarAction()
    {
    	if ($this->request->isPost())
    	{
    		$embargo = new NbEmbargos();	

    		$embargo->setNuCedula($this->request->getPost("ncedula"));
    		$embargo->setPorcentajeEmb($this->request->getPost("porcentaje"));
    		$embargo->setNumExp($this->request->getPost("nexp"));
    		$embargo->setFEmb($this->request->getPost("fdictamen"));
    		$embargo->setIdFondo($this->request->getPost("concepto"));
    		$embargo->setTribunal($this->request->getPost("Tribunal"));

    	}

		if (!$embargo->save()) {
                foreach ($embargo->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "embargos",
                    "action" => "index"
                ));
            }
        
        $ncedula = $this->request->getPost("ncedula");
        $this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        return $this->dispatcher->forward(array(
            "controller" => "embargos",
            "action" => "index",
            "params" => array($ncedula)
        ));


    }

    public function editarAction($idembargo)
    {
    	if (!$this->request->isPost())
    	{
    		
    	   	$embargo = NbEmbargos::findFirstByIdEmbargo($idembargo);


    	   	$ncedula = $embargo->nu_cedula;
			$dtrab = Datospersonales::findFirstByNuCedula($ncedula);     		

    		if (!$embargo)
    		{
				$this->flash->error("Embargo NO Encontrado");
				
				return $this->dispatcher->forward(array(
					"controller" => "embargos",
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

}

