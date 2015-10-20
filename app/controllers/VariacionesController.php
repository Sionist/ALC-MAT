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
            $Tcedula = Datospersonales::findFirstByNuCedula($cedula);
            if ($Tcedula) {
                $query = new Phalcon\Mvc\Model\Query("SELECT
                                                        NbAsignaciones.asignacion,
                                                        NbAsignaciones.id_asignac
                                                        FROM
                                                        NbAsignaciones
                                                        INNER JOIN TrabajoAsi ON TrabajoAsi.id_trabajo_asi = NbAsignaciones.id_asignac
                                                        WHERE
                                                        TrabajoAsi.nu_cedula = $cedula", $this->getDI());
                $asigsT = $query->execute()->toArray();

                $trabajador = $Tcedula->toArray();

                if ($asigsT) {
                    //deshabilita la vista para enviar JSON limpio
                    $this->view->disable();
                    //envia un JSON con los datos de las consultas en forma de array
                    $this->response->setJsonContent(array(
                        "asignaciones" => $asigsT,
                        "trabajador" => $trabajador
                    ));

                    $this->response->setStatusCode(200, "OK");
                    $this->response->send();

                } else {
                    $this->flash->error("<div class='alert alert-block alert-danger'>Error en la ejecución de la consulta</div>");
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
            $cedula = $this->request->getPost("ttcedula");
            //recibe los ids de las asignaciones y el valor de los campos, de la vista (array)
            $asigs = $this->request->getPost("asigss");
            //recibe las semanas de la vista (array)
            $semana = $this->request->getPost("semana");

            //array que almacenara los valores horas/dias de las asignaciones para hacer sustitucion en fomurla
            $param = array("v" => "");
            $cont = "0";

            foreach ($asigs as $k => $v) {
                $variacion = new Variaciones();
                $param["v"] = $v;
                $formula = $this->formula($k);
                $variacion->setNuCedula($cedula);
                $variacion->setIdAsignac($k);
                $variacion->setHorasDias($v);

                //almacena el valor del campo semana de acuerdo a su indice en el array semana
                //indice dado por el contador "cont"
                $variacion->setSemana($semana[$cont]);
                $cont++;
                $asigs_correctas = 0;
                $monto = $this->calcular($param,$formula);
                if(is_numeric($monto)){
                    $variacion->setMonto($monto);

                    if (!$variacion->save()) {
                        foreach ($variacion->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                    }
                }else{
                    $this->flash->error("<div class='alert alert-block alert-danger'>Variaciones procesadas: $asigs_correctas  procesadas</div>");
                    $this->flash->error("<div class='alert alert-block alert-danger'>La Asignación con id=$k contiene una formula que no puede ser procesada: <strong>". $formula[0]["formula"]."</strong></div>");
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

        return $query_result[0];
    }

}


