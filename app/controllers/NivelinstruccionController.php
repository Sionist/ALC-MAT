<?php

class NivelinstruccionController extends \Phalcon\Mvc\Controller
{

  public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$nivel=NivelInstruc::Find();
		$this->view->SetParamToView("nivel",$nivel);
    }



	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$nivel = new NivelInstruc();
			$nivel->SetNivelInstruc($this->request->getpost("nivel"));
			
			if (!$nivel->save()) {
                foreach ($nivel->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "nivelinstruccion",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "nivelinstruccion",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $nivel = NivelInstruc::findFirstByIdNiveldinst($id);
            if (!$nivel) {
                $this->flash->error("Nivel de Instruccion No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "nivelinstruccion",
                    "action" => "index"
                ));
            }

            $this->view->id = $nivel->id_niveldinst;

            $this->tag->setDefault("id", $nivel->getIdNiveldinst());
            $this->tag->setDefault("nivel", $nivel->getNivelInstruc());
           
            /*Idniveldinst*/
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "nivelinstruccion",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $nivel = NivelInstruc::findFirstByIdNiveldinst($id);
        if (!$nivel) {
            $this->flash->error("Nivel de Instruccion No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "nivelinstruc",
                "action" => "index"
            ));
        }

        $nivel->setNivelInstruc($this->request->getPost("nivel"));
                

        if (!$nivel->save()) {

            foreach ($nivel->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "nivelinstruc",
                "action" => "editar",
                "params" => array($nivel->id_niveldinst)
            ));
        }

        $this->flash->success("Nivel de Instruccion Actualizado");

       return $this->response->redirect('nivelinstruccion/index');

    }
}

