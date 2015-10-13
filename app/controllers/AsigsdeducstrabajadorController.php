<?php

class AsigsdeducstrabajadorController extends \Phalcon\Mvc\Controller
{

    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }

    /**
     * @param $cedula
     */
    public function indexAction($cedula)
    {
        $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nombre1, datospersonales.apellido1, datospersonales.nu_cedula FROM datospersonales where datospersonales.nu_cedula = $cedula", $this->getDI());

        $dt = $query->execute();
        //recupera id y nombre de asignaciones relacionada con la cedula
       $asig_query_exist = new Phalcon\Mvc\Model\Query("SELECT
                                                    NbAsignaciones.id_asignac,
                                                    NbAsignaciones.asignacion
                                                    FROM
                                                    TrabajoAsi
                                                    INNER JOIN NbAsignaciones ON TrabajoAsi.id_trabajo_asi = NbAsignaciones.id_asignac
                                                    WHERE
                                                    TrabajoAsi.nu_cedula = $cedula ", $this->getDI());

        $asignacionesExist = $asig_query_exist->execute();

        //recupera id y nombre de asignaciones NO relacionada con la cedula
        $asig_query_NOexist = new Phalcon\Mvc\Model\Query("SELECT
                                                    NbAsignaciones.id_asignac,
                                                    NbAsignaciones.asignacion
                                                    FROM
                                                    TrabajoAsi
                                                    INNER JOIN NbAsignaciones ON TrabajoAsi.id_trabajo_asi != NbAsignaciones.id_asignac
                                                    WHERE
                                                    TrabajoAsi.nu_cedula = $cedula ", $this->getDI());

        $asignacionesNOExist = $asig_query_NOexist->execute();

        //recupera id y nombre de deducciones relacionada con la cedula
        $deduc_query_exist = new Phalcon\Mvc\Model\Query("SELECT
                                                    NbDeducciones.id_deduccion,
                                                    NbDeducciones.nb_deduccion
                                                    FROM
                                                    TrabajoDedu
                                                    INNER JOIN NbDeducciones ON TrabajoDedu.id_trabajo_dedu = NbDeducciones.id_deduccion
                                                    WHERE
                                                    TrabajoDedu.nu_cedula = $cedula ", $this->getDI());

        $deduccionesExist = $deduc_query_exist->execute();

        $deduc_query_NOexist = new Phalcon\Mvc\Model\Query("SELECT DISTINCT
                                                    NbDeducciones.id_deduccion,
                                                    NbDeducciones.nb_deduccion
                                                    FROM
                                                    TrabajoDedu
                                                    INNER JOIN NbDeducciones ON TrabajoDedu.id_trabajo_dedu != NbDeducciones.id_deduccion
                                                    WHERE
                                                    TrabajoDedu.nu_cedula = $cedula ", $this->getDI());

        $deduccionesNOExist = $deduc_query_NOexist->execute();

        $this->tag->setDefault("cedula", $cedula);
        $this->view->setParamToView("dt", $dt);
        $this->view->setParamToView("asignacionesExist", $asignacionesExist);
        $this->view->setParamToView("asignacionesNOExist", $asignacionesNOExist);
        $this->view->setParamToView("deduccionesExist", $deduccionesExist);
        $this->view->setParamToView("deduccionesNOExist", $deduccionesNOExist);

    }

    public function guardarModificarAction(){

        if($this->request->isPost()) {
            $cedula = $this->request->getPost("cedula");

            $vista = $this->dispatcher->forward(array(
                    'controller' => 'asigsdeducstrabajador',
                    'action' => 'index',
                    'params' => array('cedula' => $cedula))
            );

            //recupera los valores de los checkbox (en estado checked)
            $asignaciones = $this->request->getPost("asignaciones");
            $deducciones = $this->request->getPost("deducciones");


            if (!$asignaciones == null || !$deducciones == null) {

                $trabajoAsi = TrabajoAsi::findFirstByNuCedula($cedula);

                if (!$trabajoAsi) {
                    //si la cedula no existe en la tabla, se creara(n) un(os) nuevo(s) registro(s)
                    $nTrabajoAsi = new TrabajoAsi();

                    foreach ($asignaciones as $asigs) {
                        $nTrabajoAsi->setIdTrabajoAsi($asigs);
                        $nTrabajoAsi->setNuCedula($cedula);

                        if (!$nTrabajoAsi->save()) {
                            foreach ($nTrabajoAsi->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                        }

                    }

                } else {
                    //si existe la cedula en la tabla se
                    //borran todos los registros asociados a la cedula
                    $this->db->delete("trabajo_asi", "nu_cedula = $cedula");

                    foreach ($asignaciones as $asigs) {
                        $trabajoAsi->setIdTrabajoAsi($asigs);
                        $trabajoAsi->setNuCedula($cedula);

                        if (!$trabajoAsi->save()) {
                            foreach ($trabajoAsi->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                        }
                    }

                }

                $trabajoDedu = TrabajoDedu::findFirstByNuCedula($cedula);

                if (!$trabajoDedu) {
                    //si la cedula no existe en la tabla, se creara(n) un(os) nuevo(s) registro(s)
                    $nTrabajoDeduc = new TrabajoDedu();

                    foreach ($deducciones as $deducs) {
                        $nTrabajoDeduc->setIdTrabajoDedu($deducs);
                        $nTrabajoDeduc->setNuCedula($cedula);

                        if (!$nTrabajoDeduc->save()) {
                            foreach ($nTrabajoDeduc->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                        }
                    }

                } else {
                    //si existe la cedula en la tabla se
                    //borran todos los registros asociados a la cedula
                    $this->db->delete("trabajo_dedu", "nu_cedula = $cedula");

                    foreach ($deducciones as $deducs) {
                        $trabajoDedu->setIdTrabajoDedu($deducs);
                        $trabajoDedu->setNuCedula($cedula);

                        if (!$trabajoDedu->save()) {
                            foreach ($trabajoDedu->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                        }
                    }

                }
                $this->flash->success("<div class='alert alert-block alert-success'>Se han guardado / modificado con exito</div>");
            }else{
                $this->flash->error("<div class='alert alert-block alert-danger'>Debe seleccionar al menos una (1) Asignación y una (1) Deducción</div>");
            }
        }
    }

}

