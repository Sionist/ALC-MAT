<?php


class AsignacionesController extends \Phalcon\Mvc\Controller
{
    //metodo que llama a la plantilla principal "blank"
    public function initialize()
    {
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

            //recupera todos los regitros
            $asignaciones = $this->modelsManager->createBuilder()
                ->from("NbAsignaciones")
                ->join("TipoNomi")
                ->join("AsigsTipo")
                ->columns("NbAsignaciones.id_asignac, NbAsignaciones.asignacion, TipoNomi.nomina, AsigsTipo.descripcion")
                ->getQuery()
                ->execute();

            //envia el arreglo con los datos a la vista
            $this->view->setParamToView('asignaciones', $asignaciones);

    }

    public function nuevaAction(){
        $this->verificarPermisos->verificar();

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
            $asignacion->setTipo($this->request->getPost("tipo"));


            if (!$asignacion->save()) {
                foreach ($asignacion->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("asignaciones");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect("asignaciones");
                $this->view->disable();
            }
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editarAction($id)
    {
       $this->verificarPermisos->verificar();

        if(!$this->request->isPost()) {
            $asignacion = NbAsignaciones::findFirstByIdAsignac($id);
            if (!$asignacion) {
                $this->flashSession->error("Asignaci�n No Encontrada");

                $this->response->redirect("asignaciones");
                $this->view->disable();
            }

            //$this->view->id = $asignacion->id_asignac;

            $this->tag->setDefault("id", $asignacion->getIdAsignac());
            $this->tag->setDefault("asignacion", $asignacion->getAsignacion());
            $this->tag->setDefault("formula", $asignacion->getFormula());
            $this->tag->setDefault("nomina", $asignacion->getTipoNomi());
            $this->tag->setDefault("frecuencia", $asignacion->getFrecuencia());
            $this->tag->setDefault("parti_presupuesto", $asignacion->getPartiPresuspuest());
            $this->tag->setDefault("denominacion", $asignacion->getDenominacion());
            $this->tag->setDefault("tipo", $asignacion->getTipo());
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
            $asignacion->setTipo($this->request->getPost("tipo"));

            if(!$asignacion->save()){
                foreach ($asignacion->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("asignaciones");
                $this->view->disable();
            }else{
                $this->flashSession->error("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");

                $this->response->redirect("asignaciones");
                $this->view->disable();
            }
        }
    }
}


