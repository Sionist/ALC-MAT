<?php

class TiposbeneficiosController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		
		$this->view->setTemplateAfter('blank');
		
	}
	
	public function indexAction()
    {
		
		$beneficio= Tiposbeneficios::find();
		
		$this->view->setParamToView("beneficio",$beneficio);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
				$beneficio = new Tiposbeneficios();
				$beneficio->setBeneficios($this->request->getPost("beneficio"));
				
				if (!$beneficio->save())
				{
					foreach ($discapacidad->getMessages() as $message) {
                    $this->flash->error($message);
					}
				
					return $this->dispatcher->forward(array(
                    "controller" => "tiposbeneficios",
                    "action" => "index"
                ));
				}
				
				$this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
				return $this->dispatcher->forward(array(
					"controller" => "tiposbeneficios",
					"action" => "index"));
		}
		
	}
	
	
	public function editarAction($id)
	{
		
		if (!$this->request->isPost())
		{
			
			$beneficio = Tiposbeneficios::findFirstByIdTipobeneficio($id);
			
			if (!$beneficio) {
                $this->flash->error("Tipo Beneficio No Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "tiposbeneficios",
                    "action" => "index"
                ));
            }
			
			$this->view->id = $beneficio->id_tipobeneficio;
			
			$this->tag->setDefault("id",$beneficio->getIdTipobeneficio());
			$this->tag->setDefault("beneficio",$beneficio->getBeneficios());
			

			
		}
	}
	
	
	public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tiposbeneficios",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $beneficio = Tiposbeneficios::findFirstByIdTipobeneficio($id);
		
        if (!$beneficio) {
            $this->flash->error("Tipo Beneficio No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tiposbeneficios",
                "action" => "index"
            ));
        }

        $beneficio->setBeneficios($this->request->getPost("beneficio"));
        

        if (!$beneficio->save()) {

            foreach ($beneficio->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tiposbeneficios",
                "action" => "editar",
                "params" => array($beneficio->id_tipobeneficio)
            ));
        }

        $this->flash->success("Tipo Beneficio Actualizado");

       return $this->response->redirect('tiposbeneficios/index');

    }
	
}

