<?php

class DiasbonificacionController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	
	public function indexAction()
	{
		
		$diasb = Diasbonificacion::find();
		
		$this->view->setParamToView("desde",$diasb);
		$this->view->setParamToView("hasta",$diasb);
		$this->view->setParamToView("diasb",$diasb);
		
	}
	
	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$diasb = new Diasbonificacion();
			
			$diasb->setMesDesde($this->request->getPost("desde"));
			$diasb->setMesHasta($this->request->getPost("hasta"));
			$diasb->setDiasBonificacion($this->request->getPost("dias"));
			
			if (!$diasb->save())
			{
				foreach ($diasb->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "diasbonificacion",
                    "action" => "index"
                ));
			}
			
			$this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
			$this->response->redirect("dias-bonificacion");
			$this->view->disable();
		}
	}
	
	public function editarAction($id)
	{
		if (!$this->request->isPost())
		{	
			
			$diasb = Diasbonificacion::findFirstByIdDiasbonificacion($id);
			
			if (!$diasb)
			{
				$this->flash->error("Registro No Encontrado");
				return $this->dispatcher->forward(array(
					"controller" => "diasbonificacion",
					"action" => "index"));
			}
			
			
			$this->view->id = $diasb->id_diasbonificacion;
			
			$this->tag->setDefault("id", $diasb->getIdDiasbonificacion());
			$this->tag->setDefault("desde", $diasb->getMesDesde());
			$this->tag->setDefault("hasta", $diasb->getMesHasta());
			$this->tag->setDefault("diasb", $diasb->getDiasBonificacion());
			
		}
	}
	
	public function editadoAction()
	{
		if ($this->request->isPost())
		{
			$id = $this->request->getPost("id");

			$diasb = Diasbonificacion::findFirstByIdDiasbonificacion($id);
			
			if (!$diasb)
			{
				$this->flash->error("Registro No Encontrado");
				return $this->dispatcher->forward(array(
					"controller" => "diasbonificacion",
					"action" => "index"));
			}
			
			$diasb->setMesDesde($this->request->getPost("desde"));
			$diasb->setMesHasta($this->request->getPost("hasta"));
			$diasb->setDiasBonificacion($this->request->getPost("diasb"));
			
			if (!$diasb->save())
			{
				foreach ($diasb->getMessages() as $mensaje )
				{
				}
				
				return $this->dispatcher->forward(array(
					"controller" => "diasbonificacion",
					"action" => "index"));
			}else {
				$this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
				$this->response->redirect("dias-bonificacion");
				$this->view->disable();
			}
		}
	}
	
}


