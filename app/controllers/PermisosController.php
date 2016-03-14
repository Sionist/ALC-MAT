<?php

class PermisosController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        $permisos = $this->modelsManager->createBuilder()
            ->from("Permisos")
            ->join("GrupoPermisos")
            ->columns("Permisos.id,Permisos.nombre,Permisos.url,GrupoPermisos.nombre as gn")
            ->getQuery()
            ->execute();

       $this->view->setVar("permisos",$permisos);
    }

    public function nuevoAction(){
        //llama a la vista de nuevo permiso
    }

    public function crearAction(){
        if($this->request->isPost()){
            $nombre = $this->request->getPost("nombre");
            $url = $this->request->getPost("url");
            $grupo = $this->request->getPost("grupo");

            $permiso = new Permisos();

            $permiso->setNombre($nombre);
            $permiso->setUrl($url);
            $permiso->setGrupoId($grupo);

            if(!$permiso->save()){
                foreach ($permiso->getMessages() as $message) {
                    $this->flashSession->error($message);
                }

                $this->response->redirect("permisos");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Permiso creado exitosamente</strong></p></div>");
                $this->response->redirect("permisos");
                $this->view->disable();
            }
        }
    }

    public function editarAction(){
        $permiso_id = $this->dispatcher->getParam("id");
        $id = Permisos::findFirstById($permiso_id);

        if($id){
            $this->tag->setDefault("id",$id->getId());
            $this->tag->setDefault("nombre",$id->getNombre());
            $this->tag->setDefault("url",$id->getUrl());
            $this->tag->setDefault("grupo",$id->getGrupoId());
        }else{
            $this->flashSession->success("<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>El permiso que intenta modificar no existe</strong></p></div>");
            $this->response->redirect("permisos");
            $this->view->disable();
        }
    }

    public function editadoAction(){
        if($this->request->isPost()){

            $id = $this->request->getPost("id");
            $nombre = $this->request->getPost("nombre");
            $url = $this->request->getPost("url");
            $grupo = $this->request->getPost("grupo");

            $permiso = Permisos::findFirstById($id);

            $permiso->setNombre($nombre);
            $permiso->setUrl($url);
            $permiso->setGrupoId($grupo);

            if(!$permiso->save()){
                foreach ($permiso->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("permisos");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Permiso modificado exitosamente</strong></p></div>");
                $this->response->redirect("permisos");
                $this->view->disable();
            }
        }
    }
}

