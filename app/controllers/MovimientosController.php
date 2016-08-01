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
        $nomina_ejec = $this->request->getPost("nomina");

        if ($cedula) {

            $tipo_nomi = $this->modelsManager->createBuilder()
                ->from("Nominas")
                ->join("TipoNomi")
                ->where("Nominas.id = :id:", array("id" => $nomina_ejec))
                ->columns("TipoNomi.id_nomina,Nominas.deudas,Nominas.embargos,Nominas.deducs")
                ->getQuery()
                ->execute()
                ->toArray();

            $nomina = $tipo_nomi[0]["id_nomina"];

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
                ->columns("NbAsignaciones.asignacion, DATE_FORMAT(Variaciones.fecha, '%d-%m-%y') as fecha, Variaciones.horas_dias, Variaciones.id_variacion, Variaciones.monto")
                ->where("Variaciones.nu_cedula = :cedula: and Variaciones.nomina = :nomina:", array("cedula" => $cedula,"nomina" => $nomina_ejec))
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

            //$deudas almacena el resultado de funcion getDeudas (array)
            //se recorre el array por indice numerico para obtener el total de deudas
            $deudas = 0;
            $deuTotal = 0;
            $deudas = $this->getDeudas($cedula);
            for($i=0;$i<count($deudas);$i++){
                foreach($deudas[$i] as $k => $v){
                    if($k == "monto"){
                        $deuTotal += $v;
                    }
                }
            }


            //$deudas almacena el resultado de funcion getEmbargos (array)
            //se recorre el array por indice numerico para obtener el total de embargos
            $embargos = 0;
            $embTotal =0;
            $embargos = $this->getEmbargos($cedula);
            for($i=0;$i<count($embargos);$i++){
                foreach($embargos[$i] as $k => $v){
                    if($k == "monto"){
                        $embTotal += $v;
                    }
                }
            }

            //se calcula el total a cancelar al trabajador

            if($tipo_nomi[0]["deudas"] == "si" && $tipo_nomi[0]["embargos"] == "si" && $tipo_nomi[0]["deducs"] == "si") {
                $total = $sb + $vTotal - $dTotal - $deuTotal - $embTotal;
            }elseif($tipo_nomi[0]["deudas"] == "si" && $tipo_nomi[0]["embargos"] == "si"){
                $total = $sb + $vTotal  - $deuTotal - $embTotal;
            }elseif($tipo_nomi[0]["deudas"] == "si" && $tipo_nomi[0]["deducs"] == "si"){
                $total = $sb + $vTotal - $deuTotal - $embTotal;
            }elseif($tipo_nomi[0]["embargos"] == "si" && $tipo_nomi[0]["deducs"] == "si"){
                $total = $sb + $vTotal - $dTotal - $embTotal;
            }elseif($tipo_nomi[0]["deudas"] == "si"){
                $total = $sb + $vTotal - $deuTotal;
            }elseif($tipo_nomi[0]["embargos"] == "si"){
                $total = $sb + $vTotal - $embTotal;
            }elseif($tipo_nomi[0]["deducs"] == "si"){
                $total = $sb + $vTotal - $dTotal;
            }

            $deducciones_cobrar = $tipo_nomi[0]["deducs"];
            $deudas_cobrar = $tipo_nomi[0]["deudas"];
            $embargos_cobrar = $tipo_nomi[0]["embargos"];

            if (count($dt) > 0) {
                $this->view->disable();
                $this->response->setJsonContent(array(
                    "variaciones" => $variaciones,
                    "vTotal" => $vTotal,
                    "deducciones" => $deducsCal,
                    "dTotal" => $dTotal,
                    "datosT" => $dt,
                    "sb" => $sb,
                    "total" => $total,
                    "deudas" => $deudas,
                    "deuTotal" => $deuTotal,
                    "embargos" => $embargos,
                    "embTotal" => $embTotal,
                    "deducs_cob" => $deducciones_cobrar,
                    "deudas_cob" => $deudas_cobrar,
                    "embargos_cob" => $embargos_cobrar
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

    private function getDeudas($cedula){
        $deuda = $this->modelsManager->createBuilder()
            ->from("NbDeudas")
            ->join("Descuentos")
            ->columns("Descuentos.descuento,NbDeudas.monto_inicial,NbDeudas.cuotas")
            ->where("NbDeudas.nu_cedula = :ci:", array("ci" => $cedula))
            ->getQuery()
            ->execute()
            ->toArray();

        $deudasT = array();
        //$total ="";
        for($i=0;$i < count($deuda[0]); $i++){
            $nombre= "";
            $monto = 0;
            foreach($deuda[$i] as $k => $v) {
                if ($k == "descuento") {
                    $deudasT[$i]["nombre"] = $v;
                }

                if ($k == "monto_inicial") {
                    $monto = $v;
                }

                if ($k == "cuotas") {
                    $deudasT[$i]["monto"] = $monto / $v;
                    //$total = $total + ($monto / $v);
                }
            }
            //$deudasT[$i]["total"] = $total;
        }


        return $deudasT;
    }

    private function getEmbargos($cedula){

        $embargos = $this->modelsManager->createBuilder()
            ->from("NbEmbargos")
            ->columns("NbEmbargos.num_exp,NbEmbargos.porcentaje_emb")
            ->where("NbEmbargos.nu_cedula = :ci:", array("ci" => $cedula))
            ->getQuery()
            ->execute()
            ->toArray();

        $sueldo_comp = $this->modelsManager->createBuilder()
            ->from("Datoscontratacion")
            ->join("Cargos", "Datoscontratacion.t_cargo = Cargos.id_cargo")
            ->join("TipoNomi","TipoNomi.id_nomina = Datoscontratacion.tipo_nom")
            ->join("Frecuencia","Frecuencia.id_frecuencia = TipoNomi.frecuencia")
            ->columns("Cargos.sueldo,Frecuencia.frecuencia")
            ->where("Datoscontratacion.nu_cedula = :ci:", array("ci" => $cedula))
            ->getQuery()
            ->execute()
            ->toArray();

        $sueldo_parc = 0;
        if($sueldo_comp[0]["frecuencia"] == "quincenal"):
            $sueldo_parc = $sueldo_comp[0]["sueldo"] / 2 ;
        elseif($sueldo_comp[0]["frecuencia"] == "semanal"):
            $sueldo_parc = ($sueldo_comp[0]["sueldo"] / 30) * 7;
        else:
            $sueldo_parc = $sueldo_comp[0]["sueldo"];
        endif;


        $embargosT = array();
        $total =0;
        for($i=0;$i < count($embargos); $i++){
            $monto = 0;
            foreach($embargos[$i] as $k => $v) {
                if ($k == "num_exp") {
                    $embargosT[$i]["num_exp"] = $v;
                }

                if ($k == "porcentaje_emb") {
                    $embargosT[$i]["monto"] = ($sueldo_parc * $v) / 100;
                    //$total = $total + $embargosT[$i]["monto"];
                }
            }
        }
        //$embargosT["total"] = $total;

        return $embargosT;
    }
}