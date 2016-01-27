<?php

class CargafamiliarController extends \Phalcon\Mvc\Controller
{
	
   public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

   public function indexAction()
    {
	//$ciudades = Ciudades::find();
    $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nu_cedula, datospersonales.nombre1 as nombret, datospersonales.apellido1 as apellidot, cargafamiliar.ci_carga, cargafamiliar.nombre1, cargafamiliar.apellido1, cargafamiliar.f_nac, cargafamiliar.ocupacion, cargafamiliar.genero, cargafamiliar.id_parentesco, parentesco.parentesco as parent FROM cargafamiliar INNER JOIN datospersonales ON datospersonales.nu_cedula=cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
		
		
    $this->view->setParamToView("carga", $cargafamiliar);
    }
	
	public function individualAction($cedula)
    {
	//$ciudades = Ciudades::find();
    $query = new Phalcon\Mvc\Model\Query("SELECT Datospersonales.nu_cedula as tra_cedula, Datospersonales.nombre1 as nombret, Datospersonales.apellido1 as apellidot, Cargafamiliar.id_carga, Cargafamiliar.ci_carga, Cargafamiliar.nombre1, Cargafamiliar.apellido1, Cargafamiliar.f_nac, Cargafamiliar.ocupacion, Cargafamiliar.genero, Cargafamiliar.id_parentesco, Parentesco.parentesco as parent FROM Cargafamiliar INNER JOIN Datospersonales ON Datospersonales.nu_cedula=Cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco WHERE Cargafamiliar.nu_cedula=$cedula", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
	
	$dtrabajador = Datospersonales::findFirstByNuCedula($cedula);	
	$cedutra=$dtrabajador->nu_cedula;
    $nombre=$dtrabajador->nu_cedula;   
		
    $this->view->setParamToView("carga", $cargafamiliar);
	$this->view->setParamToView("trabaja", $dtrabajador);
    }
	
    public function detalleAction($idcarga)
    {
	//$ciudades = Ciudades::find();
   // $query = new Phalcon\Mvc\Model\Query("SELECT Datospersonales.nu_cedula as tra_cedula, Datospersonales.nombre1 as nombret, Datospersonales.apellido1 as apellidot, Cargafamiliar.ci_carga, Cargafamiliar.nombre1, Cargafamiliar.apellido1, Cargafamiliar.f_nac, Cargafamiliar.ocupacion, Cargafamiliar.genero, Cargafamiliar.id_parentesco, Parentesco.parentesco as parent FROM Cargafamiliar INNER JOIN Datospersonales ON Datospersonales.nu_cedula=Cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco WHERE Cargafamiliar.id_carga=$idcarga", $this->getDI()); 
	
	//$cargafamiliar = $query->execute();
	
	//$cedula=$cargafamiliar->tra_cedula;	
		
		
		
	$dcarga = Cargafamiliar::findFirstByIdCarga($idcarga);	
	$cedutra=$dcarga->nu_cedula;
    $ceducarga=$dcarga->ci_carga;   
	$nombre=$dcarga->nombre1;
	$parent=$dcarga->id_parentesco;
		
		
		
	$dparent = Parentesco::findFirstByIdParentesco($parent);	
	
		
    $this->view->setParamToView("carga", $dcarga);
	$this->view->setParamToView("parentesco", $dparent);
    }
	
	public function nuevoAction($cedula)
    {
        //$ciudades = Ciudades::find();
        //$query = new Phalcon\Mvc\Model\Query("SELECT Datospersonales.nu_cedula as tra_cedula, Datospersonales.nombre1 as nombret, Datospersonales.apellido1 as apellidot, Cargafamiliar.ci_carga, Cargafamiliar.nombre1, Cargafamiliar.apellido1, Cargafamiliar.f_nac, Cargafamiliar.ocupacion, Cargafamiliar.genero, Cargafamiliar.id_parentesco, Parentesco.parentesco as parent FROM Cargafamiliar INNER JOIN Datospersonales ON Datospersonales.nu_cedula=Cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco WHERE Cargafamiliar.nu_cedula=$cedula", $this->getDI());

        // $cargafamiliar = $query->execute();

        $dtrabajador = Datospersonales::findFirstByNuCedula($cedula);
        $cedutra=$dtrabajador->nu_cedula;
        $nombre=$dtrabajador->nu_cedula;

       // $this->view->setParamToView("carga", $cargafamiliar);
        /*$this->response->redirect("trabajadores/carga-familiar/nueva-carga/$cedula");*/
        $this->view->setParamToView("trabaja", $dtrabajador);
        /*$this->view->disable();*/
    }
	
	

public function guardanuevoAction()
    {
        $cedula = $this->request->getPost("nu_cedula");
        $cargafam = new Cargafamiliar();

        $cargafam->setNuCedula($cedula);
        $cargafam->setCiCarga($this->request->getPost("ci_carga"));
        $cargafam->setNombre1($this->request->getPost("nombre1"));
        $cargafam->setNombre2($this->request->getPost("nombre2"));
        $cargafam->setApellido1($this->request->getPost("apellido1"));
        $cargafam->setApellido2($this->request->getPost("apellido2"));

        $cargafam->setFNac($this->request->getPost("f_nac"));
        $cargafam->setOcupacion($this->request->getPost("ocupacion"));
        $cargafam->setGenero($this->request->getPost("genero"));
        $cargafam->setIdParentesco($this->request->getPost("id_parentesco"));
        $cargafam->setIdDiscapacidad($this->request->getPost("id_discapacidad"));
        $cargafam->setFotoCarga($this->request->getPost("foto_carga"));

        if (!$cargafam->save()) {
                foreach ($cargafam->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("trabajadores/ver/$cedula/carga-familiar/nueva-carga/$cedula");
                $this->tag->setDefault("nu_cedula",$cedula);
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect("trabajadores/ver/$cedula/carga-familiar");
                $this->view->disable();
        }

    }
}



