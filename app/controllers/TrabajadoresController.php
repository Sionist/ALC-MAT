<?php

class TrabajadoresController extends \Phalcon\Mvc\Controller
{
	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
	
    public function indexAction()
    {
    	$trabajador = Datospersonales::find();
        $this->view->setVar("trabajadores", $trabajador);

    }
	
	public function nuevoAction()
    {
	
    }

    public function ficha1Action($cedula)
    {

        
        //buscar todos los registro por numero de cedula
        $dtrabajador = Datospersonales::findFirstByNuCedula($cedula);
        $dcontra = Datoscontratacion::findFirstByNuCedula($cedula);
        $dfinanc = Datosfinancieros::findFirstByNuCedula($cedula);
        $dprofes = Datosprofesiona::findFirstByNuCedula($cedula);

        //toma el id de los catalogos
        $ide_discapa=$dtrabajador->id_discapacidad;
        $ide_ciudad=$dtrabajador->lugar_nac;
        $ide_estatus=$dtrabajador->estatus;
        $ide_pofesion=$dprofes->id_profesion;
        $ide_nivelinstr=$dprofes->nive_instr;
        $codbanco1=$dfinanc->cod_banco;
        $tipocuenta1=$dfinanc->tipo_cuenta;
        $ide_tiponomi=$dcontra->tipo_nom;
        $ide_cargo=$dcontra->t_cargo;
        $ide_tipocont=$dcontra->tipo_cont;
        $ide_ubinom=$dcontra->ubi_nom;
        $ide_ubifun=$dcontra->ubi_fun;


        //buscar el nombre segun el id del cataogo
        $discapac1 = Discapacidad::findFirstByIdDiscapacid($ide_discapa);
        $estatus1 = EstatusT::findFirstByIdEstat($ide_estatus);
        $ciudad1 = Ciudades::findFirstByIdCiudad($ide_ciudad);
        $profesion1 = Profesiones::findFirstByIdProfesion($ide_pofesion);
        $nivelintru1 = NivelInstruc::findFirstByIdNiveldinst($ide_nivelinstr);
        $bancos1 = NbBancos::findFirstByIdBancos($codbanco1);
        $tipocuen1 = TipoCuent::findFirstByIdTipocuent($tipocuenta1);
        $tiponomi1 = TipoNomi::findFirstByIdNomina($ide_tiponomi);
        $cargo1 = Cargos::findFirstByIdCargo($ide_cargo);
        $tipocontr1 = TipoContrat::findFirstByIdContrato($ide_tipocont);
        $ubinom1 = NbDireciones::findFirstByIdDirecciones($ide_ubinom);
        $ubifun1 = NbDireciones::findFirstByIdDirecciones($ide_ubifun);




        //Envio de los view
        $this->view->setVar("dtrabajador",$dtrabajador);
        $this->view->setVar("dcontra",$dcontra);
        $this->view->setVar("dfinanc",$dfinanc);
        $this->view->setVar("dprofes",$dprofes);

        //catalogos
        $this->view->setVar("discapac1",$discapac1);
        $this->view->setVar("estatus1",$estatus1);
        $this->view->setVar("ciudad1",$ciudad1);
        $this->view->setVar("profesion1",$profesion1);
        $this->view->setVar("nivelintru1",$nivelintru1);
        $this->view->setVar("bancos1",$bancos1);
        $this->view->setVar("tipocuen1",$tipocuen1);
        $this->view->setVar("tiponomi1",$tiponomi1);
        $this->view->setVar("cargo1",$cargo1);
        $this->view->setVar("tipocontr1",$tipocontr1);
        $this->view->setVar("ubinom1",$ubinom1);
        $this->view->setVar("ubifun1",$ubifun1);
    
    }


	
	public function datospersonalesAction()
    {	

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "trabajador",
                "action" => "nuevo"
            ));
        }
    

    	
		$trabajador = new Datospersonales();

		$trabajador->setNuCedula($this->request->getPost("nu_cedula"));
		$trabajador->setRif($this->request->getPost("rif"));
		$trabajador->setNombre1(strtoupper($this->request->getPost("nombre1")));
		$trabajador->setNombre2(strtoupper($this->request->getPost("nombre2")));
		$trabajador->setApellido1(strtoupper($this->request->getPost("apellido1")));
		$trabajador->setApellido2(strtoupper($this->request->getPost("apellido2")));
		$trabajador->setGenero($this->request->getPost("genero"));
		$trabajador->setFNac($this->request->getPost("f_nac"));
		$trabajador->setLugarNac($this->request->getPost("lugar_nac"));
		$trabajador->setTelfHab($this->request->getPost("telf_hab"));
		$trabajador->setTelfCel($this->request->getPost("telf_cel"));
		$trabajador->setDirHab(strtoupper($this->request->getPost("dir_hab")));
		$trabajador->setEdoCivil(strtoupper($this->request->getPost("edo_civil")));
		$trabajador->setCorreoE(strtoupper($this->request->getPost("correo_e")));
		$trabajador->setIdDiscapacidad($this->request->getPost("id_discapacidad"));
		$trabajador->setEstatus($this->request->getPost("estatus"));
		



		/*if($this->request->hasFiles() == true){ #chequea si hay algún archivo
            $uploads = $this->request->getUploadedFiles();
            
            $isUploaded = false;
            #Hago un bucle para manejar cada archivo presente individualmente
                $i=0;
                foreach($uploads as $upload){
                    if($upload->getExtension() == "png" OR $upload->getExtension() == "jpg"){
                            if($upload->getSize() <= 2093030){
                                $path = "trabajadores/fotos/".md5(uniqid(rand(), true))."-".$upload->getName();
                                #muevo el archivo y compruebo si todo esta bien
                                ($upload->moveTo($path) == true) ? $isUploaded = true : $isUploaded = false;
                                $i++;
                            }
                            else{
                                $this->flash->success("Su archivo debe ser menor a los 2MB");
                                return $this->dispatcher->forward(array(
                                    "controller" => "trabajadores",
                                    "action" => "nuevo"
                                ));
                            }
                        
                    }  
                }          
         
                	if ($isUploaded) {
                			$trabajador->setFotoP($path);
                			if (!$trabajador->save()) {
                                foreach ($trabajador->getMessages() as $message) {
                                    $this->flash->error($message);
                                }

                                return $this->dispatcher->forward(array(
                                    "controller" => "trabajadores",
                                    "action" => "nuevo"
                                ));
                            }

                			return $this->dispatcher->forward(array(
                                    "controller" => "trabajadores",
                                    "action" => "dContratacion",
                                    "params" => array($this->request->getPost("nu_cedula"))
                                ));
                		}
        }*/

            if (!$trabajador->save()) {
                foreach ($trabajador->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "trabajadores",
                    "action" => "nuevo"
                    ));
            }


            return $this->dispatcher->forward(array(
                "controller" => "trabajadores",
                "action" => "dcontratacion",
                "params" => array($this->request->getPost("nu_cedula"))
                ));

         

            
	}

         public function getCedula1Action()
    {

        $this->view->disable();
        
        $nu_cedula1 = $this->request->get("nu_cedula");
        $cedu=Datospersonales::findFirstByNuCedula($nu_cedula1);
        if(!$cedu){
        echo"true";
        }
        else{
        echo "false";
        }
    }

	
	public function dcontratacionAction($cedula)
	{

        $trabajador = Datospersonales::findFirstByNuCedula($cedula);
        $this->view->setVar("trabajador", $trabajador);
        
    }

    public function enviarcontratacionAction()
    {

        $contratacion = new Datoscontratacion();

        $contratacion->setNuCedula($this->request->getPost("nu_cedula"));
        $contratacion->setFIng($this->request->getPost("f_ing"));
        $contratacion->setFEgre($this->request->getPost("f_egre"));
        $contratacion->setTipoNom($this->request->getPost("tipo_nom"));
        $contratacion->setLiquidac($this->request->getPost("liquidac"));
        $contratacion->setFPagoLiq($this->request->getPost("f_pago_liq"));
        $contratacion->setTCargo($this->request->getPost("t_cargo"));
        $contratacion->setTipoCont($this->request->getPost("tipo_cont"));
        $contratacion->setUbiNom($this->request->getPost("ubi_nom"));
        $contratacion->setUbiFun($this->request->getPost("ubi_fun"));


        if (!$contratacion->save()) {
                foreach ($contratacion->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "trabajadores",
                    "action" => "dcontratacion",
                    "params" => array($this->request->getPost("nu_cedula"))
                    ));
            }


            return $this->dispatcher->forward(array(
                "controller" => "trabajadores",
                "action" => "dfinanciero",
                "params" => array($this->request->getPost("nu_cedula"))
                ));
        
    }

    public function dfinancieroAction($cedula)
    {

        $trabajador = Datospersonales::findFirstByNuCedula($cedula);
        $this->view->setVar("trabajador", $trabajador);
        
    }

     public function enviarfinancieroAction()
    {

        $financiero = new Datosfinancieros();

        $financiero->setNuCedula($this->request->getPost("nu_cedula"));
        $financiero->setCodBanco($this->request->getPost("cod_banco"));
        $financiero->setNCuenta($this->request->getPost("n_cuenta"));
        $financiero->setTipoCuenta($this->request->getPost("tipo_cuenta"));
        


        if (!$financiero->save()) {
                foreach ($financiero->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "trabajadores",
                    "action" => "dfinanciero",
                    "params" => array($this->request->getPost("nu_cedula"))
                    ));
            }


            return $this->dispatcher->forward(array(
                "controller" => "trabajadores",
                "action" => "dprofesional",
                "params" => array($this->request->getPost("nu_cedula"))
                ));
        
    }

    public function dprofesionalAction($cedula)
    {

        $trabajador = Datospersonales::findFirstByNuCedula($cedula);
        $this->view->setVar("trabajador", $trabajador);
        
    }

     public function enviarprofesionalAction()
    {

        $profesional = new Datosprofesiona();

        $profesional->setNuCedula($this->request->getPost("nu_cedula"));
        $profesional->setNiveInstr($this->request->getPost("nive_instr"));
        $profesional->setIdProfesion($this->request->getPost("id_profesion"));



        if (!$profesional->save()) {
                foreach ($profesional->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "trabajadores",
                    "action" => "dprofesional",
                    "params" => array($this->request->getPost("nu_cedula"))
                    ));
            }


            return $this->dispatcher->forward(array(
                "controller" => "trabajadores",
                "action" => "ficha1",
                "params" => array($this->request->getPost("nu_cedula"))
                ));
        
    }

}

