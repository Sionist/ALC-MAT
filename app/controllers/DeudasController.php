<?php

class DeudasController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter("blank");
    }

    public function indexAction($cedula){
        $this->verificarPermisos->verificar();

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
                ->columns("Descuentos.descuento,NbDeudas.id_deuda, NbDeudas.monto_inicial,NbDeudas.cuotas,Frecuencia.frecuencia,NbDeudas.saldo,NbDeudas.f_compromiso,NbDeudas.f_ultimo_pago,NbDeudas.m_ultimo_pago")
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
        $this->verificarPermisos->verificar();

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
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
                $this->response->redirect("trabajadores/ver/$cedula/deudas");
                $this->view->disable();
            }
        }
    }

    public function editarAction(){
        $this->verificarPermisos->verificar();

        $cedula = $this->dispatcher->getParam("cedula");

        $dt = $this->modelsManager->createBuilder()
            ->from("Datospersonales")
            ->columns("nombre1,apellido1, nu_cedula")
            ->where("nu_cedula = :ci:", array("ci" => $cedula))
            ->getQuery()
            ->execute();

        $deuda = NbDeudas::findFirstByIdDeuda($this->dispatcher->getParam("id"));

        //se debio almacenar frecuencia ya que la consulta devuelve de forma embebida un objeto phalcon
        //con todos los datos de dicha frecuencia desde la tabla frecuencia
        $f = $deuda->frecuencia;

        $this->tag->setDefault("descuento",$deuda->id_descuent);
        $this->tag->setDefault("monto",$deuda->monto_inicial);
        $this->tag->setDefault("frecuencia",$f->id_frecuencia);
        $this->tag->setDefault("fCompromiso",date("d-m-Y",strtotime($deuda->f_compromiso)));
        $this->tag->setDefault("cuotas",$deuda->cuotas);
        $this->view->setVar("datos",$dt);

        $this->tag->setDefault("id",$this->dispatcher->getParam("id"));
    }

    public function editadoAction(){
        $id = $this->request->getPost("id");

        if($id){
            $deuda = NbDeudas::findFirstByIdDeuda($id);
            $deuda->setIdDescuent($this->request->getPost("descuento"));
            $deuda->setMontoInicial($this->request->getPost("monto"));
            $deuda->setSaldo($this->request->getPost("monto"));
            $deuda->setFrecuencia($this->request->getPost("frecuencia"));
            $deuda->setFCompromiso(date("Y-m-d",strtotime($this->request->getPost("fCompromiso"))));
            $deuda->setCuotas($this->request->getPost("cuotas"));

            if(!$deuda->save()){
                foreach ($deuda->getMessages() as $message) {
                    $this->flash->error($message);
                }
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado con Exito</strong></p></div>");
                $this->response->redirect("trabajadores/ver/$deuda->nu_cedula/deudas");
                $this->view->disable();
            }
        }
    }


}

