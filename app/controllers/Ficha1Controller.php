<?php

class ficha1Controller extends \Phalcon\Mvc\Controller
{
    public function editadoDPAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("cedula");
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
            $estado_civil = $this->request->getPost("estado_civil");
            $discapacidad = $this->request->getPost("discapacidad");
            $estatus = $this->request->getPost("estatus");

            $dp = Datospersonales::findFirstByNuCedula($cedula);
            $msj = false;

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

                $msj = false;
                $this->view->disable();

                if($dp->save()){
                    $msj = true;
                }

                $this->response->setJsonContent(array(
                    "msj" => $msj
                ));
                $this->response->setStatusCode(200, "OK");
                $this->response->send();
            }
        }
    }

    public function editadoDCAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("cedula");
            $f_ingre = date("Y-m-d", strtotime($this->request->getPost("f_ingre")));
            $f_egre = date("Y-m-d",strtotime($this->request->getPost("f_egre")));
            $tipo_nomina = $this->request->getPost("tipo_nomina");
            $liquidacion = $this->request->getPost("liquidacion");
            $f_liq_pago = date("Y-m-d",strtotime($this->request->getPost("pag_liquid")));
            $cargo = $this->request->getPost("cargo");
            $tipo_contrat = $this->request->getPost("tipo_contrat");
            $ubi_fun = $this->request->getPost("ubi_fun");
            $ubi_nom= $this->request->getPost("ubi_nom");

            $dc = Datoscontratacion::findFirstByNuCedula($cedula);

            $msj = false;

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

                if($dc->save()){
                    $msj = true;
                }

                $this->response->setJsonContent(array(
                    "msj" => $msj
                ));

                $this->response->setStatusCode(200,"OK");
                $this->response->send();
            }
        }
    }
    public function editadoDPFAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("cedula");
            $profesion = $this->request->getPost("profesion");
            $nivel_instruc = $this->request->getPost("nivel_instruc");

            $dpf = Datosprofesiona::findFirstByNuCedula($cedula);

            $msj = false;

            if($dpf){
                $dpf->setIdProfesion($profesion);
                $dpf->setNiveInstr($nivel_instruc);

                $this->view->disable();

                if($dpf->save()){
                    $msj = true;
                }

                $this->response->setJsonContent(array(
                    "msj" => $msj
                ));

                $this->response->setStatusCode(200,"OK");
                $this->response->send();
            }
        }
    }

    public function editadoDFAction(){
        if($this->request->isPost()){
            $cedula = $this->request->getPost("cedula");
            $banco = $this->request->getPost("nb_bancos");
            $nCta = $this->request->getPost("cta_nro");
            $tipoCuenta = $this->request->getPost("tipo_cuenta");

            $df = Datosfinancieros::findFirstByNuCedula($cedula);

            $msj = false;

            if($df){
                $df->setCodBanco($banco);
                $df->setTipoCuenta($tipoCuenta);
                $df->setNCuenta($nCta);

                $this->view->disable();

                if($df->save()){
                    $msj = true;
                }

                $this->response->setJsonContent(array(
                    "msj" => $msj
                ));

                $this->response->setStatusCode(200,"OK");
                $this->response->send();
            }
        }
    }
}

