<?php

class FondosController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    public function indexAction()
    {
		// Aqui muestra todos los registros de la tabla discapacidad
		$fondo = FondoDesc::find();
        $this->view->setParamToView("fondo", $fondo);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $fondo = new FondoDesc();
            $fondo->setFondo($this->request->getPost("fondo"));
			
			

            if (!$fondo->save()) {
                foreach ($fondo->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "fondos",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "fondos",
            "action" => "index"
        ));
    }
	
	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $fondo = FondoDesc::findFirstByIdFondo($id);
            if (!$fondo) {
                $this->flash->error("Fondo No Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "fondos",
                    "action" => "index"
                ));
            }

            $this->view->id = $fondo->id_fondo;

            $this->tag->setDefault("id", $fondo->getIdFondo());
            $this->tag->setDefault("fondo", $fondo->getFondo());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "fondos",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $fondo = FondoDesc::findFirstByIdFondo($id);
        if (!$fondo) {
            $this->flash->error("Fondo No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "fondos",
                "action" => "index"
            ));
        }

        $fondo->setFondo($this->request->getPost("fondo"));
        

        if (!$fondo->save()) {

            foreach ($fondo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "fondo",
                "action" => "editar",
                "params" => array($fondo->id_fondo)
            ));
        }

        $this->flash->success("Fondo Actualizada");

       return $this->response->redirect('fondos/index');

    }

}

