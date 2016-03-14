<?php

class DescuentosController extends \Phalcon\Mvc\Controller
{

    public function initialize()
    {
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {
        $descuento = Descuentos::Find();
        $this->view->SetParamToView("descuento", $descuento);
        $this->view->SetParamToView("rif", $descuento);
    }


    public function guardarAction()
    {
        if ($this->request->isPost()) {
            $descuento = new Descuentos();
            $descuento->setDescuento($this->request->getpost("descuento"));
            $descuento->setRif($this->request->getpost("rif"));

            if (!$descuento->save()) {
                foreach ($descuento->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "descuentos",
                    "action" => "index"
                ));
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect('descuentos');
                $this->view->disable();
            }
        }
    }

    public function editarAction($id)
    {
        if (!$this->request->isPost()) {

            $descuento = Descuentos::findFirstByIdDescuent($id);
            if (!$descuento) {
                $this->flash->error("Descuento No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "descuentos",
                    "action" => "index"
                ));
            }

            $this->view->id = $descuento->id_descuent;

            $this->tag->setDefault("id", $descuento->getIdDescuent());
            $this->tag->setDefault("descuento", $descuento->getDescuento());
            $this->tag->setDefault("rif", $descuento->getRif());

            /*Idniveldinst*/
        }

    }


    public function editadoAction()
    {
        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $descuento = Descuentos::findFirstByIdDescuent($id);

            if (!$descuento) {
                $this->flashSession->error("Descuento No Existe" . $id);

                return $this->dispatcher->forward(array(
                    "controller" => "descuentos",
                    "action" => "index"
                ));
            } else {
                $descuento->setDescuento($this->request->getPost("descuento"));
                $descuento->setRif($this->request->getPost("rif"));

                if (!$descuento->save()) {

                    foreach ($descuento->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }

                } else {
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha actualizado exitosamente</strong></p></div>");
                    $this->response->redirect('descuentos');
                    $this->view->disable();
                }
            }
        }
    }
}

