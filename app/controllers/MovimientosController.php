<?php
class MovimientosController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->view->setTemplateAfter("blank");
    }

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        //llama la vista index
    }

    /**
     * @return null
     */
    public function buscarAction()
    {
        $cedula = $this->request->getPost("cedula");
        $nomina = $this->request->getPost("nomina");
        $sqm = $this->request->getPost("sqm");
        $ano = $this->request->getPost("ano");

        if ($cedula) {

            $dt = $this->modelsManager->createBuilder()
                ->from("Datoscontratacion")
                ->join("Datospersonales")
                ->join("Cargos")
                ->join("NbDireciones")
                ->columns("Datospersonales.nu_cedula,Datospersonales.nombre1,Datospersonales.apellido1,Datospersonales.foto_p,Cargos.cargo,Datoscontratacion.tipo_nom, NbDireciones.denominacion")
                ->where("Datospersonales.nu_cedula = :cedula: AND Datoscontratacion.tipo_nom = :nomina:", array("cedula" => $cedula, "nomina" => $nomina))
                ->getQuery()
                ->execute()
                ->toArray();

            $variaciones = $this->modelsManager->createBuilder()
                ->from("Variaciones")
                ->join("NbAsignaciones")
                ->columns("NbAsignaciones.asignacion, Variaciones.horas_dias, Variaciones.ano, Variaciones.sqm, DATE_FORMAT(Variaciones.fecha, '%d-%m-%y') as fecha, Variaciones.id_variacion, Variaciones.monto")
                ->where("Variaciones.nu_cedula = :cedula: and Variaciones.sqm = :sqm: and Variaciones.ano = :ano:", array("cedula" => $cedula, "sqm" => $sqm, "ano" => $ano))
                ->getQuery()
                ->execute()
                ->toArray();

            $vTotal = 0;

            for ($i = 0; $i < count($variaciones); $i++) {
                foreach ($variaciones[$i] as $k => $v) {
                    if ($k == "monto") {
                        $vTotal = $vTotal + $v;
                    }
                }
            }

            $deducs = new Phalcon\Mvc\Model\Query("SELECT
                                                        NbDeducciones.nb_deduccion,
                                                        NbDeducciones.formula
                                                        FROM
                                                        NbDeducciones
                                                        INNER JOIN TrabajoDedu ON TrabajoDedu.id_trabajo_dedu = NbDeducciones.id_deduccion
                                                        WHERE
                                                        TrabajoDedu.nu_cedula = $cedula", $this->getDI());

            $sbT = $this->modelsManager->createBuilder()
                ->from("Cargos")
                ->join("DatosContratacion")
                ->columns("Cargos.sueldo")
                ->where("DatosContratacion.nu_cedula = :cedula:", array("cedula" => $cedula))
                ->getQuery()
                ->execute()
                ->toarray();

            $frecNomi = $this->modelsManager->createBuilder()
                ->from("Frecuencia")
                ->join("TipoNomi")
                ->columns("Frecuencia.frecuencia")
                ->where("TipoNomi.id_nomina = :nomi:", array("nomi" => $nomina))
                ->getQuery()
                ->execute()
                ->toArray();

            $sb = "";

            //se divide el sueldo dependiendo de la frencuencia de la nomina
            if (count($sbT) > 0) {
                if ($frecNomi[0]["frecuencia"] == "semanal") {
                    $sb = ($sbT[0]["sueldo"] / 30)*7;
                } elseif ($frecNomi[0]["frecuencia"] == "quincenal") {
                    $sb = $sbT[0]["sueldo"] / 2;
                } else {
                    $sb = $sbT[0]["sueldo"];
                }
            }

            $deducciones = $deducs->execute()->toArray();
            $d = array();

            //se crea array asociativo donde valor = al monto divido del sueldo
            //se pasara como parametro a la funcion calcular
            $d["sb"] = $sb;

            //instancia de controlador variaciones para usar funcion calcular
            $calcular = new VariacionesController();
            $deducsCal = array();
            $dTotal = 0;

            //variable q almacena el nombre de la deduccion
            //recorre deducciones segun indice numerico
            for ($i = 0; $i < count($deducciones); $i++) {
                foreach ($deducciones[$i] as $k => $v) {
                    //se anexa array con indice numerico
                    if ($k == "nb_deduccion") {
                        $deducsCal[$i]["deduccion"] = $v;
                    }
                    //se calcula el monto de deduccion con base en sueldo segun nomina
                    if ($k == "formula") {
                        $f = array();
                        $f["formula"] = $v;
                        $t = $calcular->calcular($d, $f);
                        //si monto es numerico se asigna monto a deduccion correspondiente
                        if (is_numeric($t)) {
                            $deducsCal[$i]["monto"] = $t;
                            $dTotal = $dTotal + $t;
                        } else {
                            $deducsCal[$i]["monto"] = "Error de formula";
                        }
                    }
                }
            }

            $total = $sb + $vTotal - $dTotal;

            if (count($dt) > 0) {
                $this->view->disable();
                $this->response->setJsonContent(array(
                    "variaciones" => $variaciones,
                    "vTotal" => $vTotal,
                    "deducciones" => $deducsCal,
                    "dTotal" => $dTotal,
                    "datosT" => $dt,
                    "sb" => $sb,
                    "total" => $total
                ));
                $this->response->setStatusCode(200, "OK");
                $this->response->send();
            } else {
                $this->view->disable();
                //return null;
            }
        } else {
            $this->view->disable();
            return null;
        }
    }

    public function modificarAction()
    {
        $id = $this->request->getPost("id");
        $valor = $this->request->getPost("valor");
        $cedula = $this->request->getPost("cedula");

        if ($id && $valor) {

            $formula = $this->modelsManager->createBuilder()
                ->from("NbAsignaciones")
                ->join("Variaciones")
                ->columns("NbAsignaciones.formula")
                ->where("Variaciones.id_variacion = :id:", array("id" => $id))
                ->getQuery()
                ->execute()
                ->toArray();

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

            $sdd["sd"] = $sd;
            $sdd["v"] = $valor;

            $calcular = new VariacionesController();

            $resultado = $calcular->calcular($sdd, $formula[0]);

            $variacion = Variaciones::findFirstByIdVariacion($id);

            $msj = "OK";

            if ($variacion) {

                if (is_numeric($resultado)) {
                    $variacion->setHorasDias($valor);
                    $variacion->setMonto($resultado);

                    if (!$variacion->save()) {
                        foreach ($variacion->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        $msj = "NO";
                    }else{
                        $msj = "OK";
                    }
                }else{
                    $msj = "NO";
                }
            }else {
                $msj = "NO";
            }

            $this->view->disable();
            //envia un JSON con los datos de las consultas en forma de array
            $this->response->setJsonContent(array(
                "msj" => $msj
            ));

            $this->response->setStatusCode(200, "OK");
            $this->response->send();
        }
    }

    public function eliminarAction(){
        $id = $this->request->getPost("id");

        $msj = "";
        if($id) {
            $variacion = Variaciones::findFirstByIdVariacion($id);

            if (!$variacion->delete()) {
                foreach ($variacion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                $msj = "NO";
            }else{
                $msj="OK";
            }
        }else{
            $msj = "NO";
        }

        $this->view->disable();
        //envia un JSON con los datos de las consultas en forma de array
        $this->response->setJsonContent(array(
            "msj" => $msj
        ));

        $this->response->setStatusCode(200, "OK");
        $this->response->send();
    }
}