<?php

class VariacionesController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }
    public function indexAction()
    {
        $query = new Phalcon\Mvc\Model\Query("SELECT
                                            vars.id_variacion,
                                            datospersonales.nu_cedula,
                                            datospersonales.nombre1,
                                            datospersonales.apellido1,
                                            nbasignaciones.id_asignac,
                                            nbasignaciones.asignacion
                                            FROM
                                            variaciones as vars
                                            INNER JOIN datospersonales ON vars.nu_cedula = datospersonales.nu_cedula
                                            INNER JOIN nbasignaciones ON vars.id_asignac = nbasignaciones.id_asignac
                                            ORDER BY
                                            datospersonales.nu_cedula ASC", $this->getDI());
        $variaciones = $query->execute();


        $this->view->setParamToView("variaciones",$variaciones);
    }

    public function buscarAction(){
        $cedula = $this->request->getPost("cedula");

        if($cedula){
            $Tcedula = Datospersonales::findFirstByNuCedula($cedula);
            if($Tcedula){
                $query = new Phalcon\Mvc\Model\Query("SELECT
                                                        NbAsignaciones.asignacion,
                                                        NbAsignaciones.id_asignac
                                                        FROM
                                                        NbAsignaciones
                                                        INNER JOIN TrabajoAsi ON TrabajoAsi.id_trabajo_asi = NbAsignaciones.id_asignac
                                                        WHERE
                                                        TrabajoAsi.nu_cedula = $cedula",$this->getDI());
                $asigsT = $query->execute()->toArray();


                if($asigsT){

                    $this->view->disable();
                    $this->response->setJsonContent(array(
                        "asignaciones" => $asigsT
                    ));

                    $this->response->setStatusCode(200, "OK");
                    $this->response->send();

                }else{
                    echo "error";
                }
            }else{
                $this->flash->error("<div class='alert alert-block alert-danger'>La cedula introducida no existe</div>");
            }
        }else{
            $this->flash->error("<div class='alert alert-block alert-danger'>Error en el envío de Dato Cedula</div>");
        }
    }

}

