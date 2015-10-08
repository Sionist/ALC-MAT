<?php

class DeduccionesController extends \Phalcon\Mvc\Controller
{

    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }
    public function indexAction()
    {
        $deducciones = NbDeducciones::find();
        $this->view->setParamToView('deducciones',$deducciones);
    }
    public function nuevaAction(){
        //llamara a la vista para crear nueva deduccion
    }

    public function guardarAction(){
        //almacena la vista
        $vista = $this->dispatcher->forward(array(
            'controller'=>'deducciones',
            'action'=>'index'
        ));

        if($this->request->isPost()){
            //almacena la vista
            $vista = $this->dispatcher->forward(array(
                'controller'=>'deducciones',
                'action'=>'index'
            ));

            $deduccion = new NbDeducciones();

            $deduccion->setNbDeduccion($this->request->getPost("deduccion"));
            $deduccion->setFormula($this->request->getPost("formula"));
            $deduccion->setIdFrecuencia($this->request->getPost("frecuencia"));
            $deduccion->setTipoNomi($this->request->getPost("nomina"));

            if(!$deduccion->save()){
                foreach ($deduccion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $vista;
            }else{
                $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
            }
        }
        else{
            //si la solicitud no es Post
            $this->flash->error("<div class='alert alert-block alert-success'>Se ha Producido un Error</div>");
            return $vista;
        }
    }

    public function editarAction($id){

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
        //almacena la vista
        $vista = $this->dispatcher->forward(array(
            'controller'=>'deducciones',
            'action'=>'index'
        ));

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
                        $this->flash->error($message);
                    }
                    return $vista;
                }else{
                    $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
                }
            }
        }else{
            //si la solicitud no es POST
            $this->flash->error("<div class='alert alert-block alert-danger'>Se Ha Producido Un Error</div>");
        }
        return $vista;
    }


}

