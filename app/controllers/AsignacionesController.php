<?php

class AsignacionesController extends \Phalcon\Mvc\Controller
{
    //msj para metodos guardado
    private $mensaje = "Guardado con Exito";

    //metodo que llama a la plantilla principal "blank"
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

    public function nuevaAction(){
        //llamara a la vista para crear nueva asignacion
    }

    public function guardarAction()
    {
        if ($this->request->isPost()) {
            $asignacion = new NbAsignaciones();

            //se asignan los valores recibidos del form a los campos de la BD
            $asignacion->setAsignacion($this->request->getPost("asignacion"));
            $asignacion->setFormula($this->request->getPost("formula"));
            $asignacion->setTipoNomi($this->request->getPost("nomina"));
            $asignacion->setFrecuencia($this->request->getPost("frecuencia"));
            $asignacion->setPartiPresuspuest($this->request->getPost("parti_presupuesto"));
            $asignacion->setDenominacion($this->request->getPost("denominacion"));

            if (!$asignacion->save()) {
                foreach ($asignacion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "asignaciones",
                    "action" => "index"
                ));
            }else{
                $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
            }
        }
        return $this->dispatcher->forward(array(
            "controller" => "asignaciones",
            "action" => "index"
        ));

    }

    public function editarAction($id)
    {
        if (!$this->request->isPost()) {

            $asignacion = NbAsignaciones::findFirstByIdAsignac($id);
            if (!$asignacion) {
                $this->flash->error("Asignación No Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "asignaciones",
                    "action" => "index"
                ));
            }

            //$this->view->id = $asignacion->id_asignac;

            $this->tag->setDefault("id", $asignacion->getIdAsignac());
            $this->tag->setDefault("asignacion", $asignacion->getAsignacion());
            $this->tag->setDefault("formula", $asignacion->getFormula());
            $this->tag->setDefault("nomina", $asignacion->getTipoNomi());
            $this->tag->setDefault("frecuencia", $asignacion->getFrecuencia());
            $this->tag->setDefault("parti_presupuesto", $asignacion->getPartiPresuspuest());
            $this->tag->setDefault("denominacion", $asignacion->getDenominacion());
        }
    }

    public function editadoAction(){

        if($this->request->isPost()){

            $id = $this->request->getPost("id");

            $asignacion = NbAsignaciones::findFirstByIdAsignac($id);

            //se asignan los valores recibidos del form a los campos de la BD
            $asignacion->setAsignacion($this->request->getPost("asignacion"));
            $asignacion->setFormula($this->request->getPost("formula"));
            $asignacion->setTipoNomi($this->request->getPost("nomina"));
            $asignacion->setFrecuencia($this->request->getPost("frecuencia"));
            $asignacion->setPartiPresuspuest($this->request->getPost("parti_presupuesto"));
            $asignacion->setDenominacion($this->request->getPost("denominacion"));

            if(!$asignacion->save()){
                foreach ($asignacion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    'controller'=>'asignaciones',
                    'action' => 'index'
                ));
            }else{
                return $this->dispatcher->forward(array(
                    'controller'=>'asignaciones',
                    'action' => 'index'
                ));
            }
        }
    }
}


