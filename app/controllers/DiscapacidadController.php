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
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "discapacidad",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        return $this->dispatcher->forward(array(
            "controller" => "discapacidad",
            "action" => "index"
        ));
    }
	
	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $discapacidad = Discapacidad::findFirstByIdDiscapacid($id);
			
            if (!$discapacidad) {
                $this->flash->error("Discapacidad No Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "discapacidad",
                    "action" => "index"
                ));
            }

            $this->view->id = $discapacidad->id_discapacid;

            $this->tag->setDefault("id", $discapacidad->getIdDiscapacid());
            $this->tag->setDefault("discapacidad", $discapacidad->getDiscapacidad());
        }
	}

	
	public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "discapacidad",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $discapacidad = Discapacidad::findFirstByIdDiscapacid($id);
        if (!$discapacidad) {
            $this->flash->error("Discapacidad no Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "discapacidad",
                "action" => "index"
            ));
        }

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
        }

        $this->flash->success("Discapacidad Actualizada");

       return $this->response->redirect('Discapacidad/index');

    }
	
	
}

