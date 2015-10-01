<?php

class ProfesionesController extends \Phalcon\Mvc\Controller
{

   public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$profesion=Profesiones::Find();
		$this->view->SetParamToView("profesion",$profesion);
    }



	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$profesion = new Profesiones();
			$profesion->setProfesion($this->request->getpost("profesion"));
			
			if (!$profesion->save()) {
                foreach ($profesion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "profesiones",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "profesiones",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $profesion = Profesiones::findFirstByIdProfesion($id);
            if (!$profesion) {
                $this->flash->error("Profesión No Fue Encontrada");

                return $this->dispatcher->forward(array(
                    "controller" => "profesiones",
                    "action" => "index"
                ));
            }

            $this->view->id = $profesion->id_profesion;

            $this->tag->setDefault("id", $profesion->getIdProfesion());
            $this->tag->setDefault("profesion", $profesion->getProfesion());
           
            /*Idniveldinst*/
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "profesiones",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $profesion = Profesiones::findFirstByIdProfesion($id);
        if (!$profesion) {
            $this->flash->error("Profesión No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "profesiones",
                "action" => "index"
            ));
        }

        $profesion->setProfesion($this->request->getPost("profesion"));
                

        if (!$profesion->save()) {

            foreach ($profesion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "profesiones",
                "action" => "editar",
                "params" => array($profesion->id_profesion)
            ));
        }

        $this->flash->success("Profesión Actualizada");

       return $this->response->redirect('profesiones/index');

    }
}

