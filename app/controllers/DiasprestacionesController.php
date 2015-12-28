<?php

class DiasprestacionesController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	
	public function indexAction()
    {
		$dias = DiasPrestaciones::find();
		$this->view->setParamToView("concepto",$dias);
		$this->view->setParamToView("dias",$dias);
    }
	
	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$conceptodia = new DiasPrestaciones();
			
			$conceptodia->setConcepto($this->request->getPost("concepto"));
			$conceptodia->setDiascc($this->request->getPost("dias"));
			
			if (!$conceptodia->save())
			{
				foreach ($conceptodia->getMessages() as $message)
				{
					$this->flash->error($message);

					$this->dispatcher->forward(array(
						"controller" => "diasprestaciones",
						"action" => "index"));
				}
			}else{
				$this->flashSession->error("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
				$this->response->redirect("dias-prestaciones");
				$this->view->disable();
			}
			
		}

		
	}
	
	public function editarAction($id)
	{
			$diaspres = DiasPrestaciones::findFirstByIdDiaspres($id);
			if (!$diaspres)
			{
				$this->flashSession->error("Registro No Encontrado");
				$this->response->redirect("dias-prestaciones");
				$this->view->disable();
			}else{
				$this->tag->setDefault("Id",$id);
				$this->tag->setDefault("concepto",$diaspres->getConcepto());
				$this->tag->setDefault("dias",$diaspres->getDiascc());
			}
	}
	
	public function editadoAction()
	{
		if ($this->request->isPost()) {

			$id = $this->request->getPost("Id");

			$diaspres = DiasPrestaciones::findFirstByIdDiaspres($id);

			if (!$diaspres) {
				$this->flashSession->error("Registro No Encontrado " . $id);
				$this->response->redirect("dias-prestaciones");
				$this->view->disable();
			}else {

				$diaspres->setConcepto($this->request->getPost("concepto"));
				$diaspres->setDiascc($this->request->getPost("dias"));

				if (!$diaspres->save()) {
					foreach ($diaspres->getMessages() as $message) {
						$this->flashSession->error($message);
					}

					return $this->dispatcher->forward(array(
						"controller" => "diasprestaciones",
						"action" => "editar",
						"params" => array($diaspres->id_diaspres)
					));
				}else {
					$this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
					$this->response->redirect("dias-prestaciones");
					$this->view->disable();
				}
			}
		}
	}

}

