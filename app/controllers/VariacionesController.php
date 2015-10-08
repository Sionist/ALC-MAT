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

}

