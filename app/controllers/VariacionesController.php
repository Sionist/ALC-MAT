<?php

class VariacionesController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        //solo llama a la vista index
    }

    public function buscarAction()
    {
        $cedula = $this->request->getPost("cedula");

        if ($cedula) {
            //$Tcedula = Datospersonales::findFirstByNuCedula($cedula);
            $Tcedula = new Phalcon\Mvc\Model\Query("SELECT
                                                    Datospersonales.nu_cedula,
                                                    Datospersonales.nombre1,
                                                    Datospersonales.apellido1,
                                                    Datospersonales.foto_p,
                                                    NbDireciones.denominacion,
                                                    Cargos.cargo
                                                    FROM
                                                    Datospersonales
                                                    INNER JOIN Datoscontratacion ON Datoscontratacion.nu_cedula = Datospersonales.nu_cedula
                                                    INNER JOIN Cargos ON Datoscontratacion.t_cargo = Cargos.id_cargo
                                                    INNER JOIN NbDireciones ON Datoscontratacion.ubi_nom = NbDireciones.id_direcciones AND Datoscontratacion.ubi_fun = NbDireciones.id_direcciones
                                                    WHERE
                                                    Datospersonales.nu_cedula = $cedula",$this->getDI());

            $SD = $this->modelsManager->createBuilder()
                ->from("Datoscontratacion")
                ->join("Cargos")
                ->columns("sueldo")
                ->where("nu_cedula=:cedula:",array("cedula"=>$cedula))
                ->getQuery()
                ->execute();

            $sd = "";
            foreach($SD as $ssd){
                 $sd = ($ssd->sueldo)/30;
            }

            if ($Tcedula) {
                /*$query = new Phalcon\Mvc\Model\Query("SELECT
                                                        NbAsignaciones.asignacion,
                                                        NbAsignaciones.id_asignac
                                                        FROM
                                                        NbAsignaciones
                                                        INNER JOIN TrabajoAsi ON TrabajoAsi.id_trabajo_asi = NbAsignaciones.id_asignac
                                                        WHERE
                                                        TrabajoAsi.nu_cedula = $cedula", $this->getDI());*/

                $asigsV = $this->modelsManager->createBuilder()
                    ->from("NbAsignaciones")
                    ->join("AsigsTipo")
                    ->columns("NbAsignaciones.id_asignac,NbAsignaciones.asignacion")
                    ->where("AsigsTipo.descripcion=:d:",array("d"=>"variables"))
                    ->getQuery()
                    ->execute()
                    ->toArray();


                $trabajador = $Tcedula->execute()->toArray();

                if (count($asigsV) > 0) {
                    //deshabilita la vista para enviar JSON limpio
                    $this->view->disable();
                    //envia un JSON con los datos de las consultas en forma de array
                    $this->response->setJsonContent(array(
                        "asignaciones" => $asigsV,
                        "trabajador" => $trabajador,
                        "sd" => $sd
                    ));

                    $this->response->setStatusCode(200, "OK");
                    $this->response->send();

                } else {
                    $this->view->disable();
                    return null;
                }
            } else {
                $this->view->disable();
            }
        } else {
            $this->view->disable();
            $this->flash->error("<div class='alert alert-block alert-danger'>Error en el envío de Dato Cedula</div>");
        }
    }

    public function procesarAction()
    {
        if ($this->request->isPost()) {

            //recupera cedula de la vista
            $cedula = $this->request->getPost("cedula");
            //recibe los ids de las asignaciones y el valor de los campos, de la vista (array)
            $asigs = $this->request->getPost("asigs");
            //recibe las semanas de la vista (array)
            $sqm = $this->request->getPost("sqm");
            //recibe la nomina
            $nomina = $this->request->getPost("nomina");
            //recibe el año
            $ano = $this->request->getPost("ano");
            //recibe suelod diario
            $sueldo = $this->request->getPost("sd");

            $date = date("d/m/y");

            //array que almacenara los valores horas/dias de las asignaciones para hacer sustitucion en fomurla
            $param = array("v" => "");

            $asigs_correctas = 0;

            foreach ($asigs as $k => $v) {
                $variacion = new Variaciones();
                $param["v"] = $v;
                $param["sd"] = $sueldo;
                $formula = $this->formula($k);
                $variacion->setNuCedula($cedula);
                $variacion->setIdAsignac($k);
                $variacion->setHorasDias($v);
                $variacion->setNomina($nomina);
                $variacion->setSqm($sqm);
                $variacion->setAno($ano);

                $variacion->setFecha(date("y/m/d"));


                $monto = $this->calcular($param, $formula);
                if (is_numeric($monto)) {
                    $variacion->setMonto($monto);

                    if (!$variacion->save()) {
                        foreach ($variacion->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                    }
                    $asigs_correctas++;

                    if ($asigs_correctas == count($asigs)) {

                        $msj_exito = "Se han procesado correctamente $asigs_correctas variaciones";

                        //deshabilita la vista para enviar JSON limpio
                        $this->view->disable();
                        //envia un JSON con los datos de las consultas en forma de array
                        $this->response->setJsonContent(array(
                            "msj_exito" => $msj_exito
                        ));

                        $this->response->setStatusCode(200, "OK");
                        $this->response->send();

                    }
                } else {
                    if ($asigs_correctas > 0 or $asigs_correctas == 0) {

                        $msj_exito = "Se han procesado correctamente $asigs_correctas variaciones";
                        $msj_error = "La Asignación con id=$k contiene una formula que no puede ser procesada: ". $formula["formula"];

                        //deshabilita la vista para enviar JSON limpio
                        $this->view->disable();

                        //envia un JSON con los datos de las consultas en forma de array
                        $this->response->setJsonContent(array(
                            "msj_exito" => $msj_exito,
                            "msj_error" => $msj_error
                        ));

                        $this->response->setStatusCode(200, "OK");
                        $this->response->send();
                    }
                }
            }
        }
    }

    /**
     * @param $param
     * @param array $formula
     * @return string
     * reempleza los datos en la formula y devuelve el resultado
     */
    private function calcular($param, $formulas)
    {

        //$array = ["sd" => "266.67"];

        //$formula = "(((sd*0.8)+sd)/7)";

        $formula = $formulas;
        //almacena la formula original
        $formula_atual = $formula;

        foreach ($param as $key => $val) {

            //reemplaza en el parametro en la formula por el valor contenido en el array
            //el id ($key) en el array es igual al nombre de la variable en la formula
            $resultado = str_replace($key, $val, $formula);

            $formula = $resultado;

           //echo $formula ;
        }

        //evalua si la formula resultante es diferente a la original
        //si es diferente, se ejecuta la funcion eval(), sino dara un msj error
        if ($formula != $formula_atual) {
            $salida ="";
            foreach ($formula as $f) {
                ob_start();
                eval("echo $f;");
                $salida = ob_get_contents();
                ob_end_clean();
            }
            return $salida;
        } else {
            return "La formula introducida no puede ser ejecuta.";
        }
    }

    /**
     * @param $id
     * @return mixed
     * devuelve la formula de la asignacion
     */
    private function formula($id)
    {
        $query = new Phalcon\Mvc\Model\Query("select formula from NbAsignaciones where id_asignac=$id", $this->getDI());

        $query_result = $query->execute()->toArray();
        foreach($query_result as $r) {
            return $r;
        }
    }

    public function nominaAction(){
        if($this->request->isPost()){
            $nomi = $this->request->getPost("nomina");

            $query = $this->modelsManager->createBuilder()
                ->from("TipoNomi")
                ->join("Frecuencia")
                ->columns("Frecuencia.frecuencia as f")
                ->where("TipoNomi.id_nomina = :nomi:", array("nomi"=>$nomi))
                ->getQuery()
                ->execute()
                ->toArray();

            if(count($query) > 0){
                //deshabilita la vista para enviar JSON limpio
                $this->view->disable();
                //envia un JSON con los datos de las consultas en forma de array
                $this->response->setJsonContent(array(
                    "tipoNomi" => $query
                ));

                $this->response->setStatusCode(200, "OK");
                $this->response->send();
            }else{
                $this->view->disable();
                return null;
            }
        }else{
            return null;
        }
    }


}


