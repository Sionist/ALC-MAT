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
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "tipotallas",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "tipotallas",
            "action" => "index"
        ));
    }
	
	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $tipotalla = TipoTallas::findFirstByIdTipotalla($id);
            if (!$tipotalla) {
                $this->flash->error("Tipo de Talla No Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "tipotallas",
                    "action" => "index"
                ));
            }

            $this->view->id = $tipotalla->id_tipotalla;

            $this->tag->setDefault("id", $tipotalla->getIdTipotalla());
            $this->tag->setDefault("tipotalla", $tipotalla->getConcepto());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipotallas",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $tipotalla = TipoTallas::findFirstByIdTipotalla($id);
        if (!$tipotalla) {
            $this->flash->error("Tipo de Talla No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tipotallas",
                "action" => "index"
            ));
        }

        $tipotalla->setConcepto($this->request->getPost("tipotalla"));
        

        if (!$tipotalla->save()) {

            foreach ($tipotalla->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipotallas",
                "action" => "editar",
                "params" => array($tipotalla->id_tipotalla)
            ));
        }

        $this->flash->success("Tipo de Talla Actualizado");

       return $this->response->redirect('tipotallas/index');

    }
}

