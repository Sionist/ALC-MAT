<?php

class GruposController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        $grupos = GrupoPermisos::find();

        $this->view->setVar("grupos",$grupos);
    }

    public function nuevoAction(){
        //llama a la vista de nuevo permiso
    }

    public function crearAction(){
        if($this->request->isPost()){
            $nombre = $this->request->getPost("nombre");

            $grupos = new GrupoPermisos();
            $grupos->setNombre($nombre);


            if(!$grupos->save()){
                foreach ($grupos->getMessages() as $message) {
                    $this->flashSession->error($message);
                }

                $this->response->redirect("grupos");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Grupo creado exitosamente</strong></p></div>");
                $this->response->redirect("grupos");
                $this->view->disable();
            }
        }
    }

    public function editarAction(){
        $grupo_id = $this->dispatcher->getParam("id");
        $id = GrupoPermisos::findFirstById($grupo_id);

        if($id){
            $this->tag->setDefault("id",$id->getId());
            $this->tag->setDefault("nombre",$id->getNombre());

        }else{
            $this->flashSession->success("<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>El grupo que intenta modificar no existe</strong></p></div>");
            $this->response->redirect("grupos");
            $this->view->disable();
        }
    }

    public function editadoAction(){

    }

}
