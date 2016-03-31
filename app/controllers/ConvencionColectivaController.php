<?php

class ConvencionColectivaController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	
	public function indexAction()
	{
		$this->verificarPermisos->verificar();

		$con = Convenciones::Find();
		$this->view->setParamToView("con",$con);
	}
	
	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$con = new Convenciones();
			
			$con->setDescripcion($this->request->getPost("descripcion"));
			$con->setFecha($this->request->getPost("fecha"));
			$con->setDuracion($this->request->getPost("duracion"));
			$con->setActiva($this->request->getPost("activa"));
			
			if (!$con->save())
			{
				foreach ($con->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "convencionColectiva",
                    "action" => "index"
                ));
			}
			
			$this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado exitosamente</strong></p></div>");
			$this->response->redirect("convencion-colectiva");
			$this->view->disable();
		}
	}
	
	public function editarAction($id)
	{
		$this->verificarPermisos->verificar();

		if (!$this->request->isPost())
		{	
			
			$conven = Convenciones::findFirstByIdConvencion($id);
			
			if (!$conven)
			{
				$this->flash->error("Registro No Encontrado");
				return $this->dispatcher->forward(array(
					"controller" => "convencionColectiva",
					"action" => "index"));
			}
			
			
			$this->view->id = $conven->id_convencion;
			
			$this->tag->setDefault("id", $conven->getIdConvencion());
			$this->tag->setDefault("descripcion", $conven->getDescripcion());
			$this->tag->setDefault("fecha", $conven->getFecha());
			$this->tag->setDefault("duracion", $conven->getDuracion());
			$this->tag->setDefault("activa", $conven->getActiva());
			
			
		}
	}
	
	public function editadoAction()
	{
		if ($this->request->isPost())
		{
			$id = $this->request->getPost("id");
			
			
			$conven = Convenciones::findFirstByIdConvencion($id);
			
			
			
			if (!$conven)
			{
				$this->flash->error("Registro No Encontrado");
				return $this->dispatcher->forward(array(
					"controller" => "convencionColectiva",
					"action" => "index"));
			}
			
			$conven->setDescripcion($this->request->getPost("descripcion"));
			$conven->setFecha($this->request->getPost("fecha"));
			$conven->setDuracion($this->request->getPost("duracion"));
			$conven->setActiva($this->request->getPost("activa"));
			
					
			if (!$conven->save())
			{
				foreach ($conven->getMessages() as $mensaje )
				{
				}
				
				return $this->dispatcher->forward(array(
					"controller" => "convencionColectiva",
					"action" => "index"));
			}

            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Modificado exitosamente</strong></p></div>");
            $this->response->redirect("convencion-colectiva");
            $this->view->disable();
		}

	}    
}

