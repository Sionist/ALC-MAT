<?php

class NominasController extends \Phalcon\Mvc\Controller
{	
	public function initialize(){
		$this->view->setTemplateAfter("blank");
	}

    public function indexAction()
    {
        $nominas = $this->modelsManager->createBuilder()
            ->from("Nominas")
            ->join("TipoNomi","Nominas.tipo_nomi = TipoNomi.id_nomina")
            ->join("EstatusNom","EstatusNom.id = Nominas.estatus")
            ->columns("TipoNomi.nomina,Nominas.sqm,Nominas.fecha,Nominas.f_inicio,Nominas.f_final,EstatusNom.estatus,Nominas.deducs,Nominas.deudas,Nominas.embargos")
            ->where("EstatusNom.estatus = :s:", array("s" => "ACTIVA"))
            ->getQuery()
            ->execute();
        $this->view->setVar("nominas", $nominas);
    }

    public function nuevaAction()
    {
        //llama a la vista
    }

    public function crearAction(){
        $finicio = $this->request->getPost("finicio");
        $ffinal=$this->request->getPost("ffinal");
        $nomi = $this->request->getPost("nomina");

        $n_activa = $this->modelsManager->createBuilder()
            ->from("Nominas")
            ->columns("Nominas.estatus")
            ->where("Nominas.estatus = 1 and Nominas.tipo_nomi = :n:", array("n" => $nomi))
            ->getQuery()
            ->execute()
            ->toArray();

        if(count($n_activa)){
            $this->flashSession->error("<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon glyphicon glyphicon-remove'></i>Error: Ya existe una nomina activa de este tipo</strong></p></div>");
            $this->response->redirect("nominas");
            $this->view->disable();
        }elseif($finicio < $ffinal) {
            $nomina = new Nominas();
            $fecha = date("Y-m-d");
            $nomina->setTipoNomi($nomi);
            $nomina->setSqm($this->request->getPost("sqm"));
            $nomina->setFecha($fecha);
            $nomina->setFInicio(date("Y-m-d", strtotime($finicio)));
            $nomina->setFFinal(date("Y-m-d",strtotime( $ffinal)));
            $nomina->setEstatus($this->request->getPost("estatus"));

            if($this->request->getPost("deducs") == 'on'):
                $nomina->setDeducs("si");
                endif;

            if($this->request->getPost("deudas") == 'on'):
                $nomina->setDeudas("si");
            endif;

            if($this->request->getPost("embargos") == 'on'):
                $nomina->setEmbargos("si");
            endif;

            if (!$nomina->save()) {
                foreach ($nomina->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("nominas");
                $this->view->disable();
            } else {
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha creado exitosamente</strong></p></div>");
                $this->response->redirect("nominas");
                $this->view->disable();
            }
        }else{
            $this->flashSession->error("<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon glyphicon glyphicon-remove'></i> Error: Fecha de inicio no puede ser mayor a Fecha de Finalizacion</strong></p></div>");
            $this->response->redirect("nominas");
            $this->view->disable();
        }

    }

    public function getFrecuenciaAction(){
        $nomi = $this->request->getPost("nomina");

        $frecuencia = $this->modelsManager->createBuilder()
            ->from("TipoNomi")
            ->join("Frecuencia")
            ->columns("Frecuencia.frecuencia")
            ->where("TipoNomi.id_nomina = :nomi:",array("nomi"=>$nomi))
            ->getQuery()
            ->execute()
            ->toArray();

        if($frecuencia){
            //deshabilita la vista para enviar JSON limpio
            $this->view->disable();
            //envia un JSON con los datos de las consultas en forma de array
            $this->response->setJsonContent(array(
                "frecuencia" => $frecuencia[0]["frecuencia"]
            ));
            $this->response->setStatusCode(200, "OK");
            $this->response->send();
        }
    }
}

