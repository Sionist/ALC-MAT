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
    $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nu_cedula, datospersonales.nombre1 as nombret, datospersonales.apellido1 as apellidot, cargafamiliar.ci_carga, cargafamiliar.nombre1, cargafamiliar.apellido1, cargafamiliar.f_nac, cargafamiliar.ocupacion, cargafamiliar.genero, cargafamiliar.id_parentesco, parentesco.parentesco as parent FROM cargafamiliar INNER JOIN datospersonales ON datospersonales.nu_cedula=cargafamiliar.nu_cedula INNER JOIN parentesco ON cargafamiliar.id_parentesco=parentesco.id_parentesco", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
		
		
    $this->view->setParamToView("carga", $cargafamiliar);
    }
	
	public function individualAction($cedula)
    {
	//$ciudades = Ciudades::find();
    $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nu_cedula as tra_cedula, datospersonales.nombre1 as nombret, datospersonales.apellido1 as apellidot, cargafamiliar.ci_carga, cargafamiliar.nombre1, cargafamiliar.apellido1, cargafamiliar.f_nac, cargafamiliar.ocupacion, cargafamiliar.genero, cargafamiliar.id_parentesco, parentesco.parentesco as parent FROM cargafamiliar INNER JOIN datospersonales ON datospersonales.nu_cedula=cargafamiliar.nu_cedula INNER JOIN parentesco ON cargafamiliar.id_parentesco=parentesco.id_parentesco WHERE cargafamiliar.nu_cedula=$cedula", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
	
	$dtrabajador = Datospersonales::findFirstByNuCedula($cedula);	
	$cedutra=$dtrabajador->nu_cedula;
    $nombre=$dtrabajador->nu_cedula;   
		
    $this->view->setParamToView("carga", $cargafamiliar);
	$this->view->setParamToView("trabaja", $dtrabajador);
    }
	
	public function nuevoAction($cedula)
    {
	//$ciudades = Ciudades::find();
    $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nu_cedula as tra_cedula, datospersonales.nombre1 as nombret, datospersonales.apellido1 as apellidot, cargafamiliar.ci_carga, cargafamiliar.nombre1, cargafamiliar.apellido1, cargafamiliar.f_nac, cargafamiliar.ocupacion, cargafamiliar.genero, cargafamiliar.id_parentesco, parentesco.parentesco as parent FROM cargafamiliar INNER JOIN datospersonales ON datospersonales.nu_cedula=cargafamiliar.nu_cedula INNER JOIN parentesco ON cargafamiliar.id_parentesco=parentesco.id_parentesco WHERE cargafamiliar.nu_cedula=$cedula", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
	
	$dtrabajador = Datospersonales::findFirstByNuCedula($cedula);	
	$cedutra=$dtrabajador->nu_cedula;
    $nombre=$dtrabajador->nu_cedula;   
		
    $this->view->setParamToView("carga", $cargafamiliar);
	$this->view->setParamToView("trabaja", $dtrabajador);
    }
	
		public function guardanuevoAction($cedula)
    {
	//$ciudades = Ciudades::find();
    $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nu_cedula as tra_cedula, datospersonales.nombre1 as nombret, datospersonales.apellido1 as apellidot, cargafamiliar.ci_carga, cargafamiliar.nombre1, cargafamiliar.apellido1, cargafamiliar.f_nac, cargafamiliar.ocupacion, cargafamiliar.genero, cargafamiliar.id_parentesco, parentesco.parentesco as parent FROM cargafamiliar INNER JOIN datospersonales ON datospersonales.nu_cedula=cargafamiliar.nu_cedula INNER JOIN parentesco ON cargafamiliar.id_parentesco=parentesco.id_parentesco WHERE cargafamiliar.nu_cedula=$cedula", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
	
	$dtrabajador = Datospersonales::findFirstByNuCedula($cedula);	
	$cedutra=$dtrabajador->nu_cedula;
    $nombre=$dtrabajador->nu_cedula;   
		
    $this->view->setParamToView("carga", $cargafamiliar);
	$this->view->setParamToView("trabaja", $dtrabajador);
    }

}

