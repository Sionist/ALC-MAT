<?php

class DeudasController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter("blank");
    }

    public function indexAction($cedula){

        if($cedula){
            $dt = $this->modelsManager->createBuilder()
                ->from("Datospersonales")
                ->columns("nombre1,apellido1, nu_cedula")
                ->where("nu_cedula = :ci:", array("ci" => $cedula))
                ->getQuery()
                ->execute();

            $deudas = $this->modelsManager->createBuilder()
                ->from("NbDeudas")
                ->join("Descuentos","Descuentos.id_descuent = NbDeudas.id_descuent")
                ->join("Frecuencia","Frecuencia.id_frecuencia = NbDeudas.frecuencia")
                ->columns("Descuentos.descuento,NbDeudas.id_deuda, NbDeudas.monto_inicial,NbDeudas.cuotas,Frecuencia.frecuencia,NbDeudas.saldo,NbDeudas.f_compromiso")
                ->where("NbDeudas.nu_cedula = :ci:", array("ci" => $cedula))
                ->orderBy("NbDeudas.id_deuda")
                ->getQuery()
                ->execute();

            $this->view->setVar("deudas", $deudas);
            $this->view->setVar("dt", $dt);
            $this->view->setVar("cedula", $cedula);
        }
    }

    public function nuevaAction($cedula){

        $dt = $this->modelsManager->createBuilder()
            ->from("Datospersonales")
            ->columns("nombre1,apellido1, nu_cedula")
            ->where("nu_cedula = :ci:", array("ci" => $cedula))
            ->getQuery()
            ->execute();

        if($cedula && $dt){
            $this->view->setVar("datos", $dt);
            $this->tag->setDefault("cedula", $cedula);
            $this->view->setVar("cedula", $cedula);

        }else{
            $this->flash->error("Se ha producido un error");
        }
    }

    public function guardarAction(){
        $cedula = $this->request->getPost("cedula");
        $f = new datetime($this->request->getPost("fCompromiso"));

        $fecha = $f->format("Y-m-d");

        if($cedula){
            $deuda = new NbDeudas();
            $deuda->setNuCedula($cedula);
            $deuda->setIdDescuent($this->request->getPost("descuento"));
            $deuda->setMontoInicial($this->request->getPost("monto"));
            $deuda->setSaldo($this->request->getPost("monto"));
            $deuda->setFrecuencia($this->request->getPost("frecuencia"));
            $deuda->setFCompromiso($fecha);
            $deuda->setCuotas($this->request->getPost("cuotas"));

            if(!$deuda->save()){
                foreach ($deuda->getMessages() as $message) {
                    $this->flash->error($message);
                }
            }else{
                $this->flashSession->error("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");

                $this->response->redirect("deudas/index/$cedula");
                $this->view->disable();
            }
        }
    }



}

