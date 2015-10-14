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

        $datosTrabajador = $query->execute();

        //recupera id y nombre de asignaciones relacionada con la cedula
        $asig_query_exist = new Phalcon\Mvc\Model\Query("SELECT
                                                    NbAsignaciones.id_asignac,
                                                    NbAsignaciones.asignacion
                                                    FROM
                                                    TrabajoAsi
                                                    INNER JOIN NbAsignaciones ON TrabajoAsi.id_trabajo_asi = NbAsignaciones.id_asignac
                                                    WHERE
                                                    TrabajoAsi.nu_cedula = $cedula ", $this->getDI());

        $asigT = $asig_query_exist->execute()->toArray();

        $asig_all = new Phalcon\Mvc\Model\Query("SELECT id_asignac, asignacion FROM NbAsignaciones",$this->getDI());

        $asigs = $asig_all->execute()->toArray();


        $asignacionesT= array();

        //reincia el indice del array con el primero en 0
        $aTTemp = array_values($asigT);

        //transforma el array bidimensional en un array undimimensional
        //almacena el recultado de la consulta asignaciones del trabajador
        for($i=0;$i<count($aTTemp); $i++){
            $asignacionesT[$aTTemp[$i]["id_asignac"]] = $aTTemp[$i]["asignacion"];
        }

        $asignaciones= array();

        //reincia el indice del array con el primero en 0
        $aTemp = array_values($asigs);

        //transforma el array bidimensional en un array
        //almacena las asignaciones globales
        for($i=0;$i<count($aTemp); $i++){
            $asignaciones[$aTemp[$i]["id_asignac"]] = $aTemp[$i]["asignacion"];
        }

        //array resultante con las asignaciones no relacionadas con el trabajador
        $asigsResult = array_diff_assoc($asignaciones,$asignacionesT);


        //recupera id y nombre de deducciones relacionada con la cedula
        $deduc_query_exist = new Phalcon\Mvc\Model\Query("SELECT
                                                    NbDeducciones.id_deduccion,
                                                    NbDeducciones.nb_deduccion
                                                    FROM
                                                    TrabajoDedu
                                                    INNER JOIN NbDeducciones ON TrabajoDedu.id_trabajo_dedu = NbDeducciones.id_deduccion
                                                    WHERE
                                                    TrabajoDedu.nu_cedula = $cedula ", $this->getDI());

        $deducsT = $deduc_query_exist->execute()->toArray();

        $deduc_all = new Phalcon\Mvc\Model\Query("SELECT id_deduccion, nb_deduccion FROM NbDeducciones",$this->getDI());

        $deducs = $deduc_all->execute()->toArray();

        //reincia el indice del array con el primero en 0
        $dTTemp = array_values($deducsT);
        $deduccionesT = array();

        //transforma el array bidimensional en un array undimimensional
        for($i=0;$i<count($dTTemp); $i++){
            $deduccionesT[$dTTemp[$i]["id_deduccion"]] = $dTTemp[$i]["nb_deduccion"];
        }

        //reincia el indice del array con el primero en 0
        $dTemp = array_values($deducs);
        $deducciones = array();

        //transforma el array bidimensional en un array undimimensional
        for($i=0;$i<count($dTemp); $i++){
            $deducciones[$dTemp[$i]["id_deduccion"]] = $dTemp[$i]["nb_deduccion"];
        }

        $deducsResult = array_diff_assoc($deducciones,$deduccionesT);
       /* var_dump($asignaciones);
        var_dump($asignacionesT);
        var_dump($asigsResult);
        var_dump($deducciones);
        var_dump($deduccionesT);
        var_dump($deducsResult);*/


        $this->tag->setDefault("cedula", $cedula);
        $this->view->setParamToView("datosTrabajador", $datosTrabajador);
        $this->view->setParamToView("asignacionesT", $asignacionesT);
        $this->view->setParamToView("asigsResult", $asigsResult);
        $this->view->setParamToView("deduccionesT", $deduccionesT);
        $this->view->setParamToView("deducsResult", $deducsResult);
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


            if ($asignaciones != null && $deducciones != null) {

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
                return $vista;
            }else{
                $this->flash->error("<div class='alert alert-block alert-danger'>Debe seleccionar al menos una (1) Asignación y una (1) Deducción</div>");
            }
        }
    }

}

