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
        $nomina = $this->request->getPost("nomina");

        if ($cedula && is_numeric($cedula)) {
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
                                                    Datospersonales.nu_cedula = $cedula AND Datoscontratacion.tipo_nom = $nomina",$this->getDI());

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

            $erroneas = array();
            $correctas="";

            $contt=0;

            foreach ($asigs as $k => $v) {
                $variacion = new Variaciones();
                $param["v"] = trim($v);
                $param["sd"] = $sueldo;
                $formula = $this->formula($k);
                $variacion->setNuCedula($cedula);
                $variacion->setIdAsignac($k);
                $variacion->setHorasDias(trim($v));
                $variacion->setNomina($nomina);
                $variacion->setSqm($sqm);
                $variacion->setAno($ano);
                

                $variacion->setFecha(date("y/m/d"));


                $monto = $this->calcular($param, $formula);

                if (is_numeric($monto) && $monto > 0) {
                    $variacion->setMonto(trim($monto));

                    if (!$variacion->save()) {
                        foreach ($variacion->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                    }
                    $asigs_correctas++;
                    $correctas = $asigs_correctas;
                } else {
                    $a = $this->modelsManager->createBuilder()
                        ->from("NbAsignaciones")
                        ->columns("asignacion")
                        ->where("id_asignac = :id:",array("id"=>$k))
                        ->getQuery()
                        ->execute()
                        ->toArray();
                    $asg = $a[0]["asignacion"];
                    $erroneas[$contt]["asignacion"]= $asg;
                    $erroneas[$contt]["formula"]= $formula["formula"];
                    $contt++;
                }
            }

            $this->view->disable();
            //envia un JSON con los datos de las consultas en forma de array
            $this->response->setJsonContent(array(
                "msj_exito" => $correctas,
                "msj_error"=> $erroneas
            ));

            $this->response->setStatusCode(200, "OK");
            $this->response->send();
        }
    }

    /**
     * @param $param
     * @param array $formula
     * @return string
     * reempleza los datos en la formula y devuelve el resultado
     */
    public function calcular($param, $formulas)
    {

        $formula = $formulas;
        //almacena la formula original
        $formula_atual = $formula;

        foreach ($param as $key => $val) {

            //reemplaza en el parametro en la formula por el valor contenido en el array
            //el id ($key) en el array es igual al nombre de la variable en la formula
            $resultado = str_replace($key, $val, $formula);

            $formula = $resultado;

            $tipo = gettype($formula);
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


