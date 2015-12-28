<?php


class DiscapacidadController extends \Phalcon\Mvc\Controller
{
	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    public function indexAction()
    {
		// Aqui muestra todos los registros de la tabla discapacidad
		$discapacidad = Discapacidad::find();
        $this->view->setParamToView("discapacidad", $discapacidad);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $discapacidad = new Discapacidad();
            $discapacidad->setDiscapacidad($this->request->getPost("discapacidad"));

            if (!$discapacidad->save()) {
                foreach ($discapacidad->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("discapacidades");
                $this->view->disable();
            }else {
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                $this->response->redirect("discapacidades");
                $this->view->disable();
            }
        }
    }
	
	public function editarAction($id) {

        $discapacidad = Discapacidad::findFirstByIdDiscapacid($id);

        if (!$discapacidad) {
            $this->flash->error("Discapacidad No Encontrada");

            return $this->dispatcher->forward(array(
                "controller" => "discapacidad",
                "action" => "index"
            ));
        }else{
            $this->view->id = $discapacidad->id_discapacid;
            $this->tag->setDefault("id", $discapacidad->getIdDiscapacid());
            $this->tag->setDefault("discapacidad", $discapacidad->getDiscapacidad());
        }
	}

	
	public function editadoAction()
    {

        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $discapacidad = Discapacidad::findFirstByIdDiscapacid($id);

            if (!$discapacidad) {
                $this->flashSession->error("Discapacidad no Existe " . $id);
                $this->response->redirect("discapacidades");
                $this->view->disable();
            }else {

                $discapacidad->setDiscapacidad($this->request->getPost("discapacidad"));

                if (!$discapacidad->save()) {

                    foreach ($discapacidad->getMessages() as $message) {
                        $this->flash->error($message);
                    }

                    return $this->dispatcher->forward(array(
                        "controller" => "discapacidad",
                        "action" => "editar",
                        "params" => array($discapacidad->id_discapacid)
                    ));
                }else{
                    $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                    $this->response->redirect("discapacidades");
                    $this->view->disable();
                }
            }
        }
    }
	
	
}

