<?php

class DocumentosbeneficiosController extends \Phalcon\Mvc\Controller
{

	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
	
    public function indexAction()
    {
		$this->verificarPermisos->verificar();

		$query = new Phalcon\Mvc\Model\Query("SELECT tiposbeneficios.id_tipobeneficio,tiposbeneficios.beneficios,documentosbeneficios.id_documentosbene,documentosbeneficios.documentos,documentosbeneficios.id_tipobeneficio as idtipobeneficio FROM tiposbeneficios,documentosbeneficios WHERE tiposbeneficios.id_tipobeneficio=documentosbeneficios.id_tipobeneficio ORDER BY tiposbeneficios.id_tipobeneficio ASC", $this->getDI()); 
	
		$documentos = $query->execute();
		
		
		$this->view->setParamToView("documentos", $documentos);
    }

	public function guardarAction()
	{
	   	if ($this->request->isPost())
		{
			$documento = new Documentosbeneficios();
			
			$documento->setDocumentos($this->request->getPost("documentos"));
			$documento->setIdTipobeneficio($this->request->getPost("tiposbene"));
			
			if (!$documento->save()) {
                foreach ($documento->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "documentosbeneficios",
                    "action" => "index"
                ));
            }
			
			$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
			return $this->dispatcher->forward(array(
				"controller" => "documentosbeneficios",
				"action" => "index"
			));
		}	
		
		
	}
	
	
	public function getDocumentosAction()
		
	{
	  $this->view->disable();
	
	  $estado = $this->request->get("estado");
		
		 $query = new Phalcon\Mvc\Model\Query("SELECT ciudades.id_ciudad, ciudades.ciudad FROM ciudades INNER JOIN estados WHERE estados.id_estado=ciudades.id_estado AND estados.id_estado=".$estado." ORDER BY ciudades.ciudad ASC", $this->getDI()); 
	
	$ciudades = $query->execute();
		
	$row = array();
	
	foreach($ciudades as $ciudad)
	{
	array_push($row,$ciudad);
	}

		$this->response->setJsonContent(array(
			"ciud" => $row
			));
		$this->response->setStatusCode(200, "OK");
		$this->response->send();
		
		
	}

	
	public function editarAction($id)
	{
		$this->verificarPermisos->verificar();

		if (!$this->request->isPost())
		{
			$documento = Documentosbeneficios::findFirstByIdDocumentosbene($id);
			if (!$documento) {
                $this->flash->error("Documento No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "documentosbeneficios",
                    "action" => "index"
                ));
            }
			
			$this->view->id = $documento->id_documentosbene;
			
			$this->tag->setDefault("id",$documento->getIdDocumentosbene());
			$this->tag->setDefault("documentosbeneficios",$documento->getDocumentos());
			
			
		}
		
		
	}

	
	public function editadoAction()
	{
		if (!$this->request->isPost())
		{
			return $this->dispatcher->forward(array(
				"controller" => "documentosbeneficios",
				"action" => "index"));
		}		
		
		$id = $this->request->getPost("id");
			
		$documento = Documentosbeneficios::findFirstByIdDocumentosbene($id);

		if (!$documento)
		{
			return $this->dispatcher->forward(array(
				"controller" => "documentosbeneficios",
				"action" => "index"));
		}
			
		$documento->setDocumentos($this->request->getPost("documentosbeneficios"));
			
		if (!$documento->save())
		{
			foreach ($documento->getMessages as $mensaje)
			{
				$this->flash->error($mensaje);
			}
				
			return $this->dispatcher->forward(array(
				"controller" => "documentosbeneficios",
				"action" => "index"));
		}
			
		$this->flash->success("Documento Actualizado Exitosamente");
		
		return $this->response->redirect("documentosbeneficios","index");
		
		
		
	}

}

