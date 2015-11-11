<?php

class MovimientosController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter("blank");
    }
    public function indexAction()
    {
        //llama la vista index
    }

    public function buscarAction(){

        $cedula = $this->request->getPost("cedula");
        $nomina= $this->request->getPost("nomina");
        $sqm= $this->request->getPost("sqm");
        $ano= $this->request->getPost("ano");

        if($cedula){

            $dt = $this->modelsManager->createBuilder()
                ->from("Datoscontratacion")
                ->join("Datospersonales")
                ->join("Cargos")
                ->columns("Datospersonales.nu_cedula,Datospersonales.nombre1,Datospersonales.apellido1,Datospersonales.foto_p,Cargos.cargo,Datoscontratacion.tipo_nom")
                ->where("Datospersonales.nu_cedula = :cedula: AND Datoscontratacion.tipo_nom = :nomina:", array("cedula" => $cedula, "nomina" => $nomina))
                ->getQuery()
                ->execute()
                ->toArray();

            $variaciones = $this->modelsManager->createBuilder()
                ->from("Variaciones")
                ->join("NbAsignaciones")
                ->columns("NbAsignaciones.asignacion, Variaciones.horas_dias, Variaciones.ano, Variaciones.sqm, Variaciones.fecha, Variaciones.id_variacion, Variaciones.monto")
                ->where("Variaciones.nu_cedula = :cedula: and Variaciones.sqm = :sqm: and Variaciones.ano = :ano:" , array("cedula" => $cedula, "sqm" => $sqm, "ano" => $ano))
                ->getQuery()
                ->execute()
                ->toArray();

            if(count($variaciones) > 0 && count($dt) > 0){
                $this->view->disable();

                $this->response->setJsonContent(array(
                    "variaciones" => $variaciones,
                    "datosT" => $dt
                ));

                $this->response->setStatusCode(200,"OK");
                $this->response->send();
            }else{
                $this->view->disable();
                //return null;
            }
        }else{
            $this->view->disable();
            return null;
        }
    }


}

