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
                    $this->flashSession->error($message);
                }
                $this->response->redirect("nivel-instruccion");
                $this->view->disable();
            }
            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
            $this->response->redirect("nivel-instruccion");
            $this->view->disable();
		}

	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $nivel = NivelInstruc::findFirstByIdNiveldinst($id);
            if (!$nivel) {
                $this->flashSession->error("Nivel de Instruccion No Fue Encontrado");
                $this->response->redirect("nivel-instruccion");
                $this->view->disable();
            }

            $this->view->id = $nivel->id_niveldinst;

            $this->tag->setDefault("id", $nivel->getIdNiveldinst());
            $this->tag->setDefault("nivel", $nivel->getNivelInstruc());
           
            /*Idniveldinst*/
        }
		
	}

	
    public function editadoAction()
    {
        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $nivel = NivelInstruc::findFirstByIdNiveldinst($id);
            if (!$nivel) {
                $this->flashSession->error("Nivel de Instruccion No Existe " . $id);
                $this->response->redirect("nivel-instruccion");
                $this->view->disable();
            }

            $nivel->setNivelInstruc($this->request->getPost("nivel"));

            if (!$nivel->save()) {

                foreach ($nivel->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("nivel-instruccion");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("nivel-instruccion");
                $this->view->disable();
            }
        }
    }
}

