<?php

class ficha1Controller extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }

    public function editarDPAction(){
        $this->verificarPermisos->verificar();

        $cedula = $this->dispatcher->getParam("cedula");
        $this->tag->setDefault("nu_cedula",$cedula);
        $dt = Datospersonales::findFirstByNuCedula($cedula);

        $this->tag->setDefault("rif",$dt->getRif());
        $nombre1 = $dt->getNombre1();
        $this->tag->setDefault("nombre1",$nombre1);
        $this->tag->setDefault("nombre2",$dt->getNombre2());
        $this->tag->setDefault("apellido1",$dt->getApellido1());
        $this->tag->setDefault("apellido2",$dt->getApellido2());

        $genero = $dt->getGenero();
        $this->view->setVar("genero",$genero);

        $this->view->setVar("datos",$dt->toArray());

        $this->tag->setDefault("lugar_nac",$dt->getLugarNac());
        $this->tag->setDefault("f_nac",date("d-m-Y",strtotime($dt->getFNac())));
        $this->tag->setDefault("telf_hab",$dt->getTelfHab());
        $this->tag->setDefault("telf_cel",$dt->getTelfCel());
        $this->tag->setDefault("dir_hab",$dt->getDirHab());
        $this->tag->setDefault("edo_civil",$dt->getEdoCivil());
        $this->tag->setDefault("correo",$dt->getCorreoE());
        $this->tag->setDefault("estatus",$dt->getEstatus());
        $this->tag->setDefault("apellido2",$dt->getApellido2());
        $this->tag->setDefault("discapacidad",$dt->getIdDiscapacidad());
    }

    public function editadoDPAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("nu_cedula");
            $nacionalidad = $this->request->getPost("nacionalidad");
            $rif = $this->request->getPost("rif");
            $nombre1 = $this->request->getPost("nombre1");
            $nombre2 = $this->request->getPost("nombre2");
            $apellido1 = $this->request->getPost("apellido1");
            $apellido2 = $this->request->getPost("apellido2");
            $genero = $this->request->getPost("genero");
            $lugar_nac = $this->request->getPost("lugar_nac");
            $fecha_nac = $this->request->getPost("f_nac");
            $telf_hab = $this->request->getPost("telf_hab");
            $telf_cel = $this->request->getPost("telf_cel");
            $dir_hab = $this->request->getPost("dir_hab");
            $correo = $this->request->getPost("correo");
            $estado_civil = $this->request->getPost("edo_civil");
            $discapacidad = $this->request->getPost("discapacidad");
            $estatus = $this->request->getPost("estatus");

            $dp = Datospersonales::findFirstByNuCedula($cedula);

            if($dp){
                $dp->setRif($rif);
                $dp->setNombre1($nombre1);
                $dp->setNombre2($nombre2);
                $dp->setApellido1($apellido1);
                $dp->setApellido2($apellido2);
                $dp->setGenero($genero);
                $dp->setNacionalidad($nacionalidad);
                $dp->setLugarNac($lugar_nac);
                $dp->setFNac(date("Y-m-d",strtotime($fecha_nac)));
                $dp->setTelfHab($telf_hab);
                $dp->setTelfCel($telf_cel);
                $dp->setLugarNac($lugar_nac);
                $dp->setDirHab($dir_hab);
                $dp->setEdoCivil($estado_civil);
                $dp->setCorreoE($correo);
                $dp->setIdDiscapacidad($discapacidad);
                $dp->setEstatus($estatus);

                if ($this->request->hasFiles() == true && $_FILES["imagen"]["size"] > 0) {

                    $foto = $cedula. '.';
                    $directorio = "C:/xampp/htdocs/sistenomialc/public/empleados/fotos/" . $foto;

                    foreach ($this->request->getUploadedFiles() as $file) {
                        if ($file->getRealType() == "image/png" || $file->getRealType() == "image/jpg" || $file->getRealType() == "image/jpeg") {
                            if ($file->getSize() <= 2048000) {
                                $foto .= $file->getExtension();
                                $directorio .= $file->getExtension();
                                $file->moveTo($directorio);
                                $dp->setFotoP($foto);

                                if (!$dp->save()) {
                                    foreach ($dp->getMessages() as $message) {
                                        $this->flashSession->error($message);
                                    }
                                    $this->response->redirect("trabajadores/ver/$cedula");
                                    $this->tag->setDefault("nu_cedula", $cedula);
                                    $this->view->disable();
                                } else {
                                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                                    $this->response->redirect("trabajadores/ver/$cedula");
                                    $this->view->disable();
                                }
                            }
                        }
                    }
                }else{
                    if (!$dp->save()) {
                        foreach ($dp->getMessages() as $message) {
                            $this->flashSession->error($message);
                        }
                        $this->response->redirect("trabajadores/ver/$cedula");
                        $this->view->disable();
                    } else {
                        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                        $this->response->redirect("trabajadores/ver/$cedula");
                        $this->view->disable();
                    }
                }
            }
        }
    }

    public function editarDCAction(){
        $this->verificarPermisos->verificar();

        $cedula = $this->dispatcher->getParam("cedula");

        $dc = Datoscontratacion::findFirstByNuCedula($cedula);
        $dt = Datospersonales::findFirstByNuCedula($cedula);

        $this->tag->setDefault("nu_cedula", $cedula);
        $this->tag->setDefault("f_ing", date("d-m-Y",strtotime($dc->f_ing)));
        $this->tag->setDefault("f_egre", date("d-m-Y",strtotime($dc->f_egre)));
        $this->tag->setDefault("tipo_nom", $dc->tipo_nom);
        $this->tag->setDefault("liquidac", $dc->liquidac);
        $this->tag->setDefault("f_pago_liq", date("d-m-Y",strtotime($dc->f_pago_liq)));
        $this->tag->setDefault("t_cargo", $dc->t_cargo);
        $this->tag->setDefault("tipo_cont", $dc->tipo_cont);
        $this->tag->setDefault("ubi_nom", $dc->ubi_nom);
        $this->tag->setDefault("ubi_fun", $dc->ubi_fun);

        $this->view->setVar("datos",$dt->toArray());
    }

    public function editadoDCAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("nu_cedula");
            $f_ingre = date("Y-m-d", strtotime($this->request->getPost("f_ing")));
            $f_egre = date("Y-m-d",strtotime($this->request->getPost("f_egre")));
            $tipo_nomina = $this->request->getPost("tipo_nom");
            $liquidacion = $this->request->getPost("liquidac");
            $f_liq_pago = date("Y-m-d",strtotime($this->request->getPost("f_pago_liq")));
            $cargo = $this->request->getPost("t_cargo");
            $tipo_contrat = $this->request->getPost("tipo_cont");
            $ubi_fun = $this->request->getPost("ubi_fun");
            $ubi_nom= $this->request->getPost("ubi_nom");

            $dc = Datoscontratacion::findFirstByNuCedula($cedula);

            if($dc){
                $dc->setFIng($f_ingre);
                $dc->setFEgre($f_egre);
                $dc->setTipoNom($tipo_nomina);
                $dc->setLiquidac($liquidacion);
                $dc->setFPagoLiq($f_liq_pago);
                $dc->setTCargo($cargo);
                $dc->setTipoCont($tipo_contrat);
                $dc->setUbiFun($ubi_fun);
                $dc->setUbiNom($ubi_nom);

                $this->view->disable();

                if (!$dc->save()) {
                    foreach ($dc->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                    $this->response->redirect("trabajadores/ver/$cedula");
                    $this->view->disable();
                } else {
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("trabajadores/ver/$cedula");
                    $this->view->disable();
                }
            }
        }
    }
    public function editarDPFAction(){
        $this->verificarPermisos->verificar();

        $cedula = $this->dispatcher->getParam("cedula");

        $nivel_inst = Datosprofesiona::findFirstByNuCedula($cedula);
        $dt = Datospersonales::findFirstByNuCedula($cedula);

        $this->tag->setDefault("nu_cedula",$cedula);
        $this->tag->setDefault("nive_instr",$nivel_inst->nive_instr);
        $this->tag->setDefault("profesion",$nivel_inst->id_profesion);
        $this->view->setVar("datos",$dt->toArray());
    }

    public function editadoDPFAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("nu_cedula");
            $profesion = $this->request->getPost("profesion");
            $nivel_instruc = $this->request->getPost("nive_instr");

            $dpf = Datosprofesiona::findFirstByNuCedula($cedula);

            if($dpf){
                $dpf->setIdProfesion($profesion);
                $dpf->setNiveInstr($nivel_instruc);

                if (!$dpf->save()) {
                    foreach ($dpf->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                    $this->response->redirect("trabajadores/ver/$cedula");
                    $this->view->disable();
                } else {
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("trabajadores/ver/$cedula");
                    $this->view->disable();
                }
            }
        }
    }
    public function editarDFAction(){
        $this->verificarPermisos->verificar();

        $cedula = $this->dispatcher->getParam("cedula");

        $df = Datosfinancieros::findFirstByNuCedula($cedula);
        $dt = Datospersonales::findFirstByNuCedula($cedula);

        $this->tag->setDefault("nu_cedula",$cedula);
        $this->tag->setDefault("cod_banco",$df->cod_banco);
        $this->tag->setDefault("num_cta",$df->n_cuenta);
        $this->tag->setDefault("tipo_cuenta",$df->tipo_cuenta);
        $this->view->setVar("datos",$dt->toArray());

    }

    public function editadoDFAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("nu_cedula");
            $banco = $this->request->getPost("cod_banco");
            $nCta = $this->request->getPost("num_cta");
            $tipoCuenta = $this->request->getPost("tipo_cuenta");

            $df = Datosfinancieros::findFirstByNuCedula($cedula);

            if($df){
                $df->setCodBanco($banco);
                $df->setTipoCuenta($tipoCuenta);
                $df->setNCuenta($nCta);

                if (!$df->save()) {
                    foreach ($df->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                    $this->response->redirect("trabajadores/ver/$cedula");
                    $this->view->disable();
                } else {
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("trabajadores/ver/$cedula");
                    $this->view->disable();
                }
            }
        }
    }
}

