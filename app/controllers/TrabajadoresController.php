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
        $trabajador = $this->modelsManager->createBuilder()
            ->from("Datospersonales")
            ->join("Datoscontratacion","Datospersonales.nu_cedula = Datoscontratacion.nu_cedula")
            ->join("TipoNomi", "Datoscontratacion.tipo_nom = TipoNomi.id_nomina")
            ->columns("Datospersonales.nu_cedula,Datospersonales.nombre1,Datospersonales.apellido1,TipoNomi.nomina")
            ->getQuery()
            ->execute();

        $this->view->setVar("trabajadores", $trabajador);
    }

    public function nuevoAction()
    {
        $this->verificarPermisos->verificar();
    }

    public function ficha1Action($cedula)
    {
        $this->verificarPermisos->verificar();

        //buscar todos los registro por numero de cedula
        /*$dtrabajador= $this->modelsManager->createBuilder()
            ->from("Datospersonales")
            ->join("EstadoCivil","Datospersonales.edo_civil = EstadoCivil.id")
            ->columns("Datospersonales.nu_cedula,Datospersonales.rif,Datospersonales.nombre1,Datospersonales.nombre2,Datospersonales.apellido1,Datospersonales.apellido2,Datospersonales.genero,Datospersonales.f_nac,Datospersonales.nacionalidad,Datospersonales.lugar_nac,Datospersonales.telf_hab,Datospersonales.telf_cel,Datospersonales.dir_hab,EstadoCivil.estado_civil,Datospersonales.correo_e,Datospersonales.foto_p,Datospersonales.id_discapacidad,Datospersonales.estatus")
            ->getQuery()
            ->execute();*/

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
        $edo_civil = EstadoCivil::findFirstById($dtrabajador->edo_civil);

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
        $this->view->setVar("edo_civil",$edo_civil);

        $this->tag->setDefault("edo_civil", $dtrabajador->getEdoCivil());
        $this->tag->setDefault("estatus", $dtrabajador->getEstatus());
        $this->tag->setDefault("discapacidad", $dtrabajador->getIdDiscapacidad());
        $this->tag->setDefault("cedula", $cedula);
        $this->tag->setDefault("lugar_nac", $dtrabajador->getLugarNac());
        $this->tag->setDefault("nacionalidad", $dtrabajador->getNacionalidad());
        $this->tag->setDefault("cargos", $cargo1->getIdCargo());
        $this->tag->setDefault("ubi_fun", $ubifun1->getIdDirecciones());
        $this->tag->setDefault("ubi_nom", $ubinom1->getIdDirecciones());
        $this->tag->setDefault("tipo_contrat", $tipocontr1->getIdContrato());
        $this->tag->setDefault("tipo_nomina", $tiponomi1->getIdNomina());
        $this->tag->setDefault("profesion", $profesion1->getIdProfesion());
        $this->tag->setDefault("nivel_instruc", $nivelintru1->getIdNiveldinst());
        $this->tag->setDefault("nb_bancos", $bancos1->getIdBancos());
        $this->tag->setDefault("tipo_cuenta", $tipocuen1->getIdTipocuent());

    }

    public function datospersonalesAction()
    {	

        if ($this->request->isPost()) {
            $cedula = $this->request->getPost("nu_cedula");
            $trabajador = new Datospersonales();

            $trabajador->setNuCedula($cedula);
			$trabajador->setNacionalidad($this->request->getPost("nacionalidad"));
            $trabajador->setRif($this->request->getPost("rif"));
            $trabajador->setNombre1(strtoupper($this->request->getPost("nombre1")));
            $trabajador->setNombre2(strtoupper($this->request->getPost("nombre2")));
            $trabajador->setApellido1(strtoupper($this->request->getPost("apellido1")));
            $trabajador->setApellido2(strtoupper($this->request->getPost("apellido2")));
            $trabajador->setGenero($this->request->getPost("genero"));
            $trabajador->setFNac(date("Y-m-d", strtotime($this->request->getPost("f_nac"))));
            $trabajador->setLugarNac($this->request->getPost("lugar_nac"));
            $trabajador->setTelfHab($this->request->getPost("telf_hab"));
            $trabajador->setTelfCel($this->request->getPost("telf_cel"));
            $trabajador->setDirHab(strtoupper($this->request->getPost("dir_hab")));
            $trabajador->setEdoCivil(strtoupper($this->request->getPost("edo_civil")));
            $trabajador->setCorreoE(strtoupper($this->request->getPost("correo_e")));
            $trabajador->setIdDiscapacidad($this->request->getPost("id_discapacidad"));
            $trabajador->setEstatus($this->request->getPost("estatus"));

            if ($this->request->hasFiles() == true && $_FILES["imagen"]["size"] > 0) {

                $foto = $cedula. '.';
                $directorio = "C:/xampp/htdocs/sistenomialc/public/empleados/fotos/" . $foto;

                foreach ($this->request->getUploadedFiles() as $file) {
                    if ($file->getRealType() == "image/png" || $file->getRealType() == "image/jpg" || $file->getRealType() == "image/jpeg") {
                        if ($file->getSize() <= 2048000) {
                            $foto .= $file->getExtension();
                            $directorio .= $file->getExtension();
                            $file->moveTo($directorio);
                            $trabajador->setFotoP($foto);

                            if (!$trabajador->save()) {
                                foreach ($trabajador->getMessages() as $message) {
                                    $this->flashSession->error($message);
                                }
                                $this->response->redirect("trabajadores/nuevo-trabajador");
                                $this->view->disable();
                            }else{
                                $this->response->redirect("trabajadores/nuevo-trabajador/datos-contratacion/$cedula");
                                $this->view->disable();
                            }
                        }
                    }
                }
            }else{
                if (!$trabajador->save()) {
                    foreach ($trabajador->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                    $this->response->redirect("trabajadores/nuevo-trabajador");
                    $this->view->disable();
                }else{
                    $this->response->redirect("trabajadores/nuevo-trabajador/datos-contratacion/$cedula");
                    $this->view->disable();
                }
            }

        }
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
        $this->tag->setDefault("nu_cedula",$cedula);
        $this->view->setVar("trabajador", $trabajador);
        
    }

    public function enviarcontratacionAction()
    {

        $cedula = $this->request->getPost("nu_cedula");

        $contratacion = new Datoscontratacion();

        $contratacion->setNuCedula($cedula);
        $contratacion->setFIng(date("Y-m-d",strtotime($this->request->getPost("f_ing"))));
        $contratacion->setFEgre(date("Y-m-d",strtotime($this->request->getPost("f_egre"))));
        $contratacion->setTipoNom($this->request->getPost("tipo_nom"));
        $contratacion->setLiquidac($this->request->getPost("liquidac"));
        $contratacion->setFPagoLiq(date("Y-m-d",strtotime($this->request->getPost("f_pago_liq"))));
        $contratacion->setTCargo($this->request->getPost("t_cargo"));
        $contratacion->setTipoCont($this->request->getPost("tipo_cont"));
        $contratacion->setUbiNom($this->request->getPost("ubi_nom"));
        $contratacion->setUbiFun($this->request->getPost("ubi_fun"));


        if (!$contratacion->save()) {
                foreach ($contratacion->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("trabajadores/nuevo-trabajador/datos-contratacion/$cedula");
                $this->view->disable();
            }else{
                $this->response->redirect("trabajadores/nuevo-trabajador/datos-financieros/$cedula");
                $this->view->disable();
        }
    }

    public function dfinancieroAction($cedula)
    {
        $trabajador = Datospersonales::findFirstByNuCedula($cedula);
        $this->tag->setDefault("nu_cedula",$cedula);
        $this->view->setVar("trabajador", $trabajador);
    }

    public function enviarfinancieroAction()
    {
        $financiero = new Datosfinancieros();
        $cedula = $this->request->getPost("nu_cedula");
        $financiero->setNuCedula($cedula);
        $financiero->setCodBanco($this->request->getPost("cod_banco"));
        $financiero->setNCuenta($this->request->getPost("n_cuenta"));
        $financiero->setTipoCuenta($this->request->getPost("tipo_cuenta"));

        if (!$financiero->save()) {
                foreach ($financiero->getMessages() as $message) {
                    $this->flash->error($message);
                }
                $this->response->redirect("trabajadores/nuevo-trabajador/datos-financieros/$cedula");
                $this->view->disable();
            }

        $this->response->redirect("trabajadores/nuevo-trabajador/datos-profesionales/$cedula");
        $this->view->disable();
    }

    public function dprofesionalAction($cedula)
    {
        $trabajador = Datospersonales::findFirstByNuCedula($cedula);
        $this->tag->setDefault("nu_cedula",$cedula);
        $this->view->setVar("trabajador", $trabajador);
    }

     public function enviarprofesionalAction()
    {

        $profesional = new Datosprofesiona();
        $cedula = $this->request->getPost("nu_cedula");
        $profesional->setNuCedula($this->request->getPost("nu_cedula"));
        $profesional->setNiveInstr($this->request->getPost("nive_instr"));
        $profesional->setIdProfesion($this->request->getPost("id_profesion"));


        if (!$profesional->save()) {
                foreach ($profesional->getMessages() as $message) {
                    $this->flash->error($message);
                }
            $this->response->redirect("trabajadores/nuevo-trabajador/datos-profesionales/$cedula");
            $this->view->disable();
            }
        $this->response->redirect("trabajadores/ver/$cedula");
        $this->view->disable();
        
    }

    public function ficha2Action(){

    }

}

