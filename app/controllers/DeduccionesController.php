<?php

class DeduccionesController extends \Phalcon\Mvc\Controller
{

    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }
    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $deducciones = NbDeducciones::find();
        $this->view->setParamToView('deducciones',$deducciones);
    }
    public function nuevaAction(){
        $this->verificarPermisos->verificar();

        //llamara a la vista para crear nueva deduccion
    }

    public function guardarAction(){

        if($this->request->isPost()){
            $deduccion = new NbDeducciones();
            $deduccion->setNbDeduccion($this->request->getPost("deduccion"));
            $deduccion->setFormula($this->request->getPost("formula"));
            $deduccion->setIdFrecuencia($this->request->getPost("frecuencia"));
            $deduccion->setTipoNomi($this->request->getPost("nomina"));

            if(!$deduccion->save()){
                foreach ($deduccion->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("deducciones");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado exitosamente</strong></p></div>");
                $this->response->redirect("deducciones");
                $this->view->disable();
            }
        }
    }

    public function editarAction($id){
        $this->verificarPermisos->verificar();

        if($this->request->isGet()){
            $deduccion = NbDeducciones::findFirst($id);

            $this->tag->setDefault('id', $deduccion->getIdDeduccion());
            $this->tag->setDefault('deduccion', $deduccion->getNbDeduccion());
            $this->tag->setDefault('formula', $deduccion->getFormula());
            $this->tag->setDefault('frecuencia', $deduccion->getIdFrecuencia());
            $this->tag->setDefault('nomina', $deduccion->getTipoNomi());
        }
    }

    public function editadoAction(){

        if($this->request->isPost()){
            //almacena el valor del tag id de la vista
            $id = $this->request->getPost('id');

            $deduccion = NbDeducciones::findFirst($id);

            if($deduccion){
                $deduccion->setNbDeduccion($this->request->getPost('deduccion'));
                $deduccion->setFormula($this->request->getPost('formula'));
                $deduccion->setIdFrecuencia($this->request->getPost('frecuencia'));
                $deduccion->setTipoNomi($this->request->getPost('nomina'));

                if(!$deduccion->save()){
                    foreach ($deduccion->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                }else{
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Editado exitosamente</strong></p></div>");
                    $this->response->redirect("deducciones");
                    $this->view->disable();
                }
            }
        }
    }


}

