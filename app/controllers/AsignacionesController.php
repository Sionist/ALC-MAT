<?php

class AsignacionesController extends \Phalcon\Mvc\Controller
{
    /*
     * metodo que llama a la plantilla principal "blank"
     */
    public function initialize()
    {
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        //recupera todos los regitros
        $asignaciones = NbAsignaciones::find();

        //envia el arreglo con los datos a la vista
        $this->view->setParamToView('asignaciones', $asignaciones);
    }

    public function guardarAction()
    {
        if ($this->request->isPost()) {
            $asignacion = new NbAsignaciones();

            //se asignan los valores recibidos del form a los campos de la BD
            $asignacion->setAsignacion($this->request->getPost("asignacion"));
            $asignacion->setFormula($this->request->getPost("formula"));
            $asignacion->setTipoNomi($this->request->getPost("tipo_nomina"));
            $asignacion->setFrecuencia($this->request->getPost("frecuencia"));
            $asignacion->setPartiPresuspuest($this->request->getPost("parti_presupuesto"));
            $asignacion->setDenominacion($this->request->getPost("denominacion"));

            //almacena vista index
            $vista = $this->dispatcher->forward(array(
                "controller" => "asignaciones",
                "action" => "index"
            ));

            if (!$asignacion->save()) {
                foreach ($asignacion->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $vista;
            }else{
                $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
                return $vista;
            }
        }

    }
}

