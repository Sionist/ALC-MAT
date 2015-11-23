<?php

class MovimientosController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter("blank");
    }
    public function indexAction()
    {
        //llama la vista index
    }

    /**
     * @return null
     */
    public function buscarAction(){

        $cedula = $this->request->getPost("cedula");
        $nomina= $this->request->getPost("nomina");
        $sqm= $this->request->getPost("sqm");
        $ano= $this->request->getPost("ano");

        if($cedula){

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
                ->columns("NbAsignaciones.asignacion, Variaciones.horas_dias, Variaciones.ano, Variaciones.sqm, Variaciones.fecha, Variaciones.id_variacion, Variaciones.monto")
                ->where("Variaciones.nu_cedula = :cedula: and Variaciones.sqm = :sqm: and Variaciones.ano = :ano:" , array("cedula" => $cedula, "sqm" => $sqm, "ano" => $ano))
                ->getQuery()
                ->execute()
                ->toArray();

            $deducs = new Phalcon\Mvc\Model\Query("SELECT
                                                        NbDeducciones.nb_deduccion,
                                                        NbDeducciones.formula
                                                        FROM
                                                        NbDeducciones
                                                        INNER JOIN TrabajoDedu ON TrabajoDedu.id_trabajo_dedu = NbDeducciones.id_deduccion
                                                        WHERE
                                                        TrabajoDedu.nu_cedula = $cedula",$this->getDI());

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
            if($frecNomi[0]["frecuencia"] == "semanal"){
                $sb = $sbT[0]["sueldo"]/4;
            }elseif($frecNomi[0]["frecuencia"] == "quincenal"){
                $sb = $sbT[0]["sueldo"]/2;
            }else{
                $sb = $sbT[0]["sueldo"];
            }

            $deducciones = $deducs->execute()->toArray();

            $d = array();

            //se crea array asociativo donde valor = al monto divido del sueldo
            //se pasara como parametro a la funcion calcular
            $d["sb"] = $sb;

            //instancia de controlador variaciones para usar funcion calcular
            $calcular = new VariacionesController();

            $deducsCal = array();

            //variable q almacena el nombre de la deduccion

            //recorre deducciones segun indice numerico
            for($i = 0; $i < count($deducciones); $i++) {
                foreach ($deducciones[$i] as $k => $v) {

                    //se anexa array con indice numerico
                    if($k == "nb_deduccion"){
                        $deducsCal[$i]["deduccion"] = $v;
                    }

                    //se calcula el monto de deduccion con base en sueldo segun nomina
                    if ($k == "formula") {
                        $f = array();
                        $f["formula"] = $v;
                        $t = $calcular->calcular($d, $f);

                        //si monto es numerico se asigna monto a deduccion correspondiente
                        if(is_numeric($t)) {
                            $deducsCal[$i]["monto"] = $t;
                        }else{
                            $deducsCal[$i]["monto"] = "Error de formula";
                        }
                    }
                }
            }

            if(count($dt) > 0){
                $this->view->disable();

                $this->response->setJsonContent(array(
                    "variaciones" => $variaciones,
                    "deducciones" => $deducsCal,
                    "datosT" => $dt,
                    "sb" => $sb
                ));

                $this->response->setStatusCode(200,"OK");
                $this->response->send();
            }else{
                $this->view->disable();
                //return null;
            }
        }else{
            $this->view->disable();
            return null;
        }
    }
}

