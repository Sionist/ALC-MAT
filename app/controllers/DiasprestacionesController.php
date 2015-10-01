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
			}
			
		}
		
		$this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
			return $this->dispatcher->forward(array(
				"controller" => "diasprestaciones",
				"action" => "index"));
		
	}
	
	public function editarAction($id)
	{
		
		
		if (!$this->request->isPost())
		{
			
			$diaspres = DiasPrestaciones::findFirstByIdDiaspres($id);
			if (!$diaspres)
			{
				$this->flash->error("Registro No Encontrado");
				$this->dispatcher->forward(array(
				"controller" => "diasprestaciones",
				"action" => "index"));
			}
			
			$this->view->id = $diaspres->id_diaspres;
			
			/*$concepto = $this->view->concepto = $diaspres->concepto;*/
			
			$this->tag->setDefault("Id",$id);
			$this->tag->setDefault("concepto",$diaspres->concepto);
			$this->tag->setDefault("dias",$diaspres->diascc);
				
		}
		
	}
	
	public function editadoAction()
	{
		if (!$this->request->isPost())
		{
			$this->dispatcher->forward(array(
				"controller" => "diasprestaciones",
				"action" => "index"));
		}
		
		$id = $this->request->getPost("Id");

		
		$diaspres = DiasPrestaciones::findFirstByIdDiaspres($id);
		
		if (!$diaspres)
		{
			$this->flash->error("Registro No Encontrado ".$id);
			
			return $this->dispatcher->forward(array(
				"controller" => "diasprestaciones",
				"action" => "index"));
		}
		  
		
		$diaspres->setConcepto($this->request->getPost("concepto"));
		$diaspres->setDiascc($this->request->getPost("dias"));
		
		
		if (!$diaspres->save())
		{
			foreach ($diaspres->getMessages() as $message) {
               $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "diasprestaciones",
                "action" => "editar",
                "params" => array($diaspres->id_diaspres)
            ));
		}
		
		$this->flash->success("Dias de Prestaciones Actualizados");
		
		return $this->response->redirect("diasprestaciones/index");
	}
	
}

