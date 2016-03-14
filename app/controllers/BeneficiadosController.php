<?php

class BeneficiadosController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

    public function indexAction($idembargo)
    {
		$this->verificarPermisos->verificar();

		$dembargo = NbEmbargos::findFirstByIdEmbargo($idembargo);
        $ncedula  = $dembargo->nu_cedula;

		$dtrab     = DatosPersonales::findFirstByNuCedula($ncedula);
    	$nombre1   = $dtrab->nombre1;
    	$apellido1 = $dtrab->apellido1;

    	$this->tag->setDefault("ncedula",$ncedula);
        $this->tag->setDefault("idembargo",$idembargo);

    	$this->view->nombre1   = $nombre1;
    	$this->view->apellido1 = $apellido1;
    	$this->view->nu_cedula = $ncedula;

    	$consulta = $this->modelsManager->createBuilder()
    	->from("Beneficiados")
    	->join("NbEmbargos")
    	->columns("NbEmbargos.id_embargo,NbEmbargos.nu_cedula,Beneficiados.id_beneficiado,Beneficiados.nu_cedula,Beneficiados.ci_beneficiado,Beneficiados.apellidos,Beneficiados.nombres,
    		Beneficiados.f_nacimiento,Beneficiados.id_embargo,NbEmbargos.nu_cedula")
    	->where("Beneficiados.id_embargo = :idemb:",array("idemb"=>$ncedula))
    	->getQuery()
    	->execute();

    	//$embargos = $consulta->execute();

    	//$embargos = NbEmbargos::find(array("nu_cedula = nu_cedula", "order" => "id_embargo"));
    	
    	$this->view->SetParamToView("beneficiados",$consulta);

    }

    
    public function guardarAction()
    {
    	if ($this->request->isPost())
    	{
    		$beneficiado = new Beneficiados();	

    		$beneficiado->setNuCedula($this->request->getPost("ncedula"));
    		$beneficiado->setCiBeneficiado($this->request->getPost("cibene"));
    		$beneficiado->setApellidos($this->request->getPost("apellidos"));
    		$beneficiado->setNombres($this->request->getPost("nombres"));
    		$beneficiado->setFNacimiento($this->request->getPost("fnac"));
            $beneficiado->setIdEmbargo($this->request->getPost("idembargo"));

    	}

		if (!$beneficiado->save()) {
                foreach ($beneficiado->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "beneficiados",
                    "action" => "index"
                ));
            }
        
        $ncedula = $this->request->getPost("ncedula");
        $this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        return $this->dispatcher->forward(array(
            "controller" => "beneficiados",
            "action" => "index",
            "params" => array($ncedula)
        ));


    }

    public function editarAction($idembargo)
    {
		$this->verificarPermisos->verificar();

		if (!$this->request->isPost())
    	{
    		
    		$embargo = NbEmbargos::findFirstByIdEmbargo($idembargo);

    		if (!$embargo)
    		{
				$this->flash->error("Embargo NO Encontrado");
				
				return $this->dispatcher->forward(array(
					"controller" => "embargos",
					"action" => "index",
					"params" => array($ncedula)
				));				    		
    		}    	   	



    	   	$ncedula = $embargo->nu_cedula;
			$dtrab = Datospersonales::findFirstByNuCedula($ncedula);     		
    		$this->view->nombre1 = $dtrab->nombre1;
    		$this->view->apellido1 = $dtrab->apellido1;


			$idfondo = $embargo->id_fondo;
			$fondo = FondoDesc::findFirstByIdFondo($idfondo);
			//$this->view->fondo = $fondo->fondo;


    		$this->view->idembargo = $embargo->id_embargo;
    		$this->view->ncedula = $embargo->nu_cedula;

    		$this->tag->setDefault("idembargo",$embargo->getIdEmbargo());
    		$this->tag->setDefault("ncedula",$embargo->getNuCedula());
    		$this->tag->setDefault("tribunal",$embargo->getTribunal());
    		$this->tag->setDefault("nexpediente",$embargo->getNumExp());
    		$this->tag->setDefault("fdictamen",$embargo->getFEmb());
    		$this->tag->setDefault("porcentaje",$embargo->getPorcentajeEmb());

    		$this->tag->setDefault("concepto",$embargo->getIdFondo());
    	}	
    }


    public function editadoAction()
    {
    	if ($this->request->isPost())
    	{

    		$idembargo = $this->request->getPost("idembargo");
    		$ncedula = $this->request->getPost("ncedula");

    		$embargo = NbEmbargos::findFirstByIdEmbargo($idembargo);

    		if (!$embargo)
    		{
    			$this->flash->error("Embargo NO Encontrado");
    			return $this->dispatcher->forward(array("controller" => "embargos",
    				"action" => "index",
    				"params" => array($ncedula)));
    		}

    		$embargo->setNuCedula($this->request->getPost("ncedula"));
    		$embargo->setPorcentajeEmb($this->request->getPost("porcentaje"));
    		$embargo->setNumExp($this->request->getPost("nexpediente"));
    		$embargo->setFEmb($this->request->getPost("fdictamen"));
    		$embargo->setIdFondo($this->request->getPost("concepto"));
    		$embargo->setTribunal($this->request->getPost("tribunal"));
    		

    		if (!$embargo->save())
    		{
    			foreach ($embargo->getMessages() as $message) {
                    $this->flash->error($message);
                }	

                return $this->dispatcher->forward(array("controller" => "embargos",
                    "action" => "index",
                    "params" => array($ncedula)
                 ));
    		}

    		$this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Modificación Exitosa</strong></p></div>");
    		return $this->dispatcher->forward(array("controller" => "embargos", "action" => "index", "params" => array($ncedula)));

    	}
    }

}

