<?php

class BeneficiadosController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

    public function indexAction()
    {

        $this->verificarPermisos->verificar();

        $id = $this->dispatcher->getParam("id");
        $cedula = $this->dispatcher->getParam("cedula");

		

		$idembargo = NbEmbargos::findFirstByIdEmbargo($id);
        $tribunal = $idembargo->tribunal;
        $nexpediente = $idembargo->num_exp;
        $this->view->tribunal = $tribunal;
        $this->view->nexpediente = $nexpediente;


        //$ncedula  = $idembargo->nu_cedula;

		$dtrab     = DatosPersonales::findFirstByNuCedula($cedula);
    	$nombre1   = $dtrab->nombre1;
    	$apellido1 = $dtrab->apellido1;

    	$this->tag->setDefault("ncedula",$cedula);
        $this->tag->setDefault("idembargo",$id);

    	$this->view->nombre1   = $nombre1;
    	$this->view->apellido1 = $apellido1;
    	$this->view->nu_cedula = $cedula;

    	$consulta = $this->modelsManager->createBuilder()
    	->from("NbEmbargos")
    	->join("Beneficiados")
    	->columns("NbEmbargos.id_embargo,Beneficiados.id_embargo,NbEmbargos.nu_cedula,Beneficiados.nu_cedula,Beneficiados.ci_beneficiado,Beneficiados.apellidos,
    		Beneficiados.nombres,Beneficiados.f_nacimiento,Beneficiados.id_beneficiado")
    	->where('NbEmbargos.id_embargo = :id_embargo:')
    	//->where('NbEmbargos.id_embargo = :id:',array('id'=>$id))
        //->where("Beneficiados.id_embargo = ".$id.)
    	->getQuery()
    	->execute(array('id_embargo' => $id));
    	//->execute();

    	//$embargos = $consulta->execute();

    	//$embargos = NbEmbargos::find(array("nu_cedula = nu_cedula", "order" => "id_embargo"));
    	
    	$this->view->SetParamToView("beneficiado",$consulta);

    }

    
    public function guardarAction()
    {
    	if ($this->request->isPost())
    	{
            $ncedula = $this->request->getPost("ncedula");
            $idembargo = $this->request->getPost("idembargo");

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

                $this->response->redirect("/trabajadores/ver/$ncedula/embargos/$idembargo/beneficiados");
                $this->view->disable();
            }
        
        
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        $this->response->redirect("trabajadores/ver/$ncedula/embargos/$idembargo/beneficiados");
        $this->view->disable();


    }

    public function editarAction()
    {
		$this->verificarPermisos->verificar();

		if (!$this->request->isPost())
    	{
    		
		    $id = $this->dispatcher->getParam("id");
	        $cedula = $this->dispatcher->getParam("cedula");

    		$beneficiado = Beneficiados::findFirstByIdBeneficiado($id);

    		if (!$beneficiado)
    		{
				$this->flash->error("Beneficiado NO Encontrado");
				
				$this->response->redirect("trabajadores/ver/$cedula/embargos/beneficiados/editar/$id");

				//return $this->dispatcher->forward(array(
				//	"controller" => "embargos",
				//	"action" => "index",
				//	"params" => array($ncedula)
				//));				    		
    		}    	   	

    	   	$ncedula = $beneficiado->nu_cedula;
    	   	$idembargo = $beneficiado->id_embargo;


			$dtrab = Datospersonales::findFirstByNuCedula($ncedula);     		
    		$this->view->nombre1 = $dtrab->nombre1;
    		$this->view->apellido1 = $dtrab->apellido1;
    		$this->view->ncedula = $ncedula;

			$embargo = NbEmbargos::findFirstByIdEmbargo($idembargo);
        	$tribunal = $embargo->tribunal;
        	$nexpediente = $embargo->num_exp;

        	$this->view->tribunal = $tribunal;
        	$this->view->nexpediente = $nexpediente;
    		
    	//	$this->view->idembargo = $embargo->id_embargo;
    	//	

    		$this->tag->setDefault("idbeneficiado",$beneficiado->getIdBeneficiado());
    		//$this->tag->setDefault("ncedula",$beneficiado->getNuCedula());
    		$this->tag->setDefault("cibene",$beneficiado->getCiBeneficiado());
    	//	$this->tag->setDefault("nexpediente",$embargo->getNumExp());
    	//	$this->tag->setDefault("fdictamen",$embargo->getFEmb());
    	//	$this->tag->setDefault("porcentaje",$embargo->getPorcentajeEmb());

    	//	$this->tag->setDefault("concepto",$embargo->getIdFondo());
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

