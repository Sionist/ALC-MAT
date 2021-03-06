<?php

class VariacionesController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $nominas = $this->modelsManager->createBuilder()
            ->from("Nominas")
            ->join("TipoNomi")
            ->columns("Nominas.id, TipoNomi.nomina")
            ->getQuery()
            ->execute();

        $this->view->setVar("nominas", $nominas);
    }

    public function buscarAction()
    {
        $cedula = $this->request->getPost("cedula");
        $nomina = $this->request->getPost("nomina");

        $tipoNomi = $this->modelsManager->createBuilder()
            ->from("Nominas")
            ->columns("Nominas.tipo_nomi")
            ->where("Nominas.id = :id:", array("id" => $nomina))
            ->getQuery()
            ->execute()
            ->ToArray();

        $nomi = $tipoNomi[0]['tipo_nomi'];
        if ($cedula && is_numeric($cedula)) {

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
                                                        Datospersonales.nu_cedula = $cedula AND Datoscontratacion.tipo_nom = $nomi", $this->getDI());

            $trabajador = $Tcedula->execute()->toArray();

            if (count($trabajador) > 0) {

            $enReposo = false;

            //consulta la fecha de finalizacion de reposo mas alta
            $reposo = $this->modelsManager->createBuilder()
                ->from("NbReposo")
                ->columns("MAX(f_final)")
                ->where("nu_cedula= :ci:", array("ci" => $cedula))
                ->getQuery()
                ->execute()
                ->toArray();

            //almacena la fecha de reposo si existe
            $f_rep = "";
            //almacena la fecha actual
            $f_actual = date('Y-m-d');

            foreach ($reposo as $k => $v) {
                foreach ($v as $a) {
                    $f_rep = $a;
                }
            }

            //si la fecha de reposo es mayor a fecha actual, esta en reposo (true)
            if ($f_rep > $f_actual) {
                $enReposo = true;
            }

                $SD = $this->modelsManager->createBuilder()
                    ->from("Datoscontratacion")
                    ->join("Cargos")
                    ->columns("sueldo")
                    ->where("nu_cedula=:cedula:", array("cedula" => $cedula))
                    ->getQuery()
                    ->execute();

                $sd = "";
                foreach ($SD as $ssd) {
                    $sd = ($ssd->sueldo) / 30;
                }

                if ($enReposo == false) {

                    $asigsV = $this->modelsManager->createBuilder()
                        ->from("NbAsignaciones")
                        ->join("AsigsTipo")
                        ->columns("NbAsignaciones.id_asignac,NbAsignaciones.asignacion")
                        ->where("AsigsTipo.descripcion=:d:", array("d" => "variables"))
                        ->getQuery()
                        ->execute()
                        ->toArray();

                    if (count($asigsV) > 0) {
                        //deshabilita la vista para enviar JSON limpio
                        $this->view->disable();
                        //envia un JSON con los datos de las consultas en forma de array
                        $this->response->setJsonContent(array(
                            "asignaciones" => $asigsV,
                            "trabajador" => $trabajador,
                            "sd" => $sd,
                            "enReposo" => $enReposo
                        ));

                        $this->response->setStatusCode(200, "OK");
                        $this->response->send();

                    } else {
                        $this->view->disable();
                        return null;
                    }
                }else {
                    $this->view->disable();
                    //envia un JSON con los datos de las consultas en forma de array
                    $this->response->setJsonContent(array(
                        "enReposo" => $enReposo,
                        "trabajador" => $trabajador,
                        "hasta" => date("d-m-Y",strtotime($f_rep))
                    ));
                    $this->response->setStatusCode(200, "OK");
                    $this->response->send();
                }
            } else {
                    $this->view->disable();
                    $this->response->setJsonContent(array(
                        "trabajador" => $trabajador
                    ));
                    $this->response->setStatusCode(200, "OK");
                    $this->response->send();
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
                ->from("Nominas")
                ->join("TipoNomi")
                ->columns("Nominas.sqm, Nominas.fecha, Nominas.f_inicio, Nominas.f_final, Nominas.deducs,Nominas.deudas,Nominas.embargos, TipoNomi.nomina")
                ->where("Nominas.id = :nomi:", array("nomi"=>$nomi))
                ->getQuery()
                ->execute()
                ->toArray();

            if(count($query) > 0){
                $fecha = date("d-m-Y", strtotime($query[0]["fecha"]));
                $f_ini = date("d-m-Y", strtotime($query[0]["f_inicio"]));
                $f_fin = date("d-m-Y", strtotime($query[0]["f_final"]));
                //deshabilita la vista para enviar JSON limpio
                $this->view->disable();
                //envia un JSON con los datos de las consultas en forma de array
                $this->response->setJsonContent(array(
                    "tipoNomi" => $query,
                    "f_ini" => $f_ini,
                    "f_fin" => $f_fin,
                    "fecha" => $fecha
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


