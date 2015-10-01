<?php

class ParentescoController extends \Phalcon\Mvc\Controller
{

 	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    public function indexAction()
    {
		// Aqui muestra todos los registros de la tabla discapacidad
		$parentesco = Parentesco::find();
        $this->view->setParamToView("parentesco", $parentesco);

    }
	
	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $parentesco = new Parentesco();
            $parentesco->setParentesco($this->request->getPost("parentesco"));
			
			

            if (!$parentesco->save()) {
                foreach ($parentesco->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "parentesco",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "parentesco",
            "action" => "index"
        ));
    }
	
	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $parentesco = Parentesco::findFirstByIdParentesco($id);
            if (!$parentesco) {
                $this->flash->error("Parentesco No Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "parentesco",
                    "action" => "index"
                ));
            }

            $this->view->id = $parentesco->id_parentesco;

            $this->tag->setDefault("id", $parentesco->getIdParentesco());
            $this->tag->setDefault("parentesco", $parentesco->getParentesco());
           
            
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "parentesco",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $parentesco = Parentesco::findFirstByIdParentesco($id);
        if (!$parentesco) {
            $this->flash->error("Parentesco No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "parentesco",
                "action" => "index"
            ));
        }

        $parentesco->setParentesco($this->request->getPost("parentesco"));
        

        if (!$parentesco->save()) {

            foreach ($parentesco->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "parentesco",
                "action" => "editar",
                "params" => array($parentesco->id_parentesco)
            ));
        }

        $this->flash->success("Parentesco Actualizado");

       return $this->response->redirect('parentesco/index');

    }

}

