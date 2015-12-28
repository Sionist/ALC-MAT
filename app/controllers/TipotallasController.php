<?php

class TipotallasController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    public function indexAction()
    {
		// Aqui muestra todos los registros de la tabla discapacidad
		$tipotalla = TipoTallas::find();
        $this->view->setParamToView("tipotalla", $tipotalla);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $tipotalla = new TipoTallas();
            $tipotalla->setConcepto($this->request->getPost("tipotalla"));

            if (!$tipotalla->save()) {
                foreach ($tipotalla->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tallas");
                $this->view->disable();
            }
            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
            $this->response->redirect("tallas");
            $this->view->disable();
        }
    }
	
	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $tipotalla = TipoTallas::findFirstByIdTipotalla($id);
            if (!$tipotalla) {
                $this->flashSession->error("Tipo de Talla No Encontrado");
                $this->response->redirect("tallas");
                $this->view->disable();
            }
            $this->view->id = $tipotalla->id_tipotalla;
            $this->tag->setDefault("id", $tipotalla->getIdTipotalla());
            $this->tag->setDefault("tipotalla", $tipotalla->getConcepto());
        }
	}

	
public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");
            $tipotalla = TipoTallas::findFirstByIdTipotalla($id);

            if (!$tipotalla) {
                $this->flashSession->error("Tipo de Talla No Existe " . $id);
                $this->response->redirect("tallas");
                $this->view->disable();
            }

            $tipotalla->setConcepto($this->request->getPost("tipotalla"));

            if (!$tipotalla->save()) {

                foreach ($tipotalla->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tallas");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tallas");
                $this->view->disable();
            }
        }
    }
}

