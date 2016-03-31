<?php

class TiposNominasController extends \Phalcon\Mvc\Controller
{

	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }

	public function indexAction()
	{
        $this->verificarPermisos->verificar();

        $query = new Phalcon\Mvc\Model\Query("SELECT Frecuencia.frecuencia as frecuenc, TipoNomi.nomina, TipoNomi.id_nomina, TipoNomi.frecuencia  FROM Frecuencia INNER JOIN TipoNomi where Frecuencia.id_frecuencia=TipoNomi.frecuencia", $this->getDI());
		$query2 = new Phalcon\Mvc\Model\Query("SELECT * FROM Frecuencia", $this->getDI());

		//echo var_dump($query);

		$tiponomi=$query->execute();
		$frecuen=$query2->execute();
		
		/*$tiponomi=TipoNomi::Find();*/
		
		$this->view->SetParamToView("tiponomi",$tiponomi);
		$this->view->SetParamToView("frecuencia",$frecuen);
    }

	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$tiponomi = new TipoNomi();
			$tiponomi->setNomina($this->request->getpost("tiponomi"));
			$tiponomi->setFrecuencia($this->request->getpost("frecuencia"));
			
			if (!$tiponomi->save()) {
                foreach ($tiponomi->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-nominas");
                $this->view->disable();
            }
            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
            $this->response->redirect("tipos-nominas");
            $this->view->disable();
		}
	}	

    public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {
            $tiponomi = TipoNomi::findFirstByIdNomina($id);
            if (!$tiponomi) {
                $this->flashSession->error("Tipo de Nómina No Fue Encontrado");
                $this->response->redirect("tipos-nominas");
                $this->view->disable();
            }

            $this->view->id = $tiponomi->id_nomina;
			$this->view->idfre = $tiponomi->frecuencia;
			
            $this->tag->setDefault("id", $tiponomi->getIdNomina());
            $this->tag->setDefault("tiponomi", $tiponomi->getNomina());
			$this->tag->setDefault("frecuencia", $tiponomi->getFrecuencia());
        }
	}


    public function editadoAction()
    {
        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");
            $idf = $this->request->getPost("idf");

            $tiponomi = TipoNomi::findFirstByIdNomina($id);
            if (!$tiponomi) {
                $this->flashSession->error("Tipo de Nómina No Existe " . $id);
                $this->response->redirect("tipos-nominas");
                $this->view->disable();
            }

            $tiponomi->setNomina($this->request->getPost("tiponomi"));
            $tiponomi->setFrecuencia($this->request->getPost("frecuencia"));

            if (!$tiponomi->save()) {

                foreach ($tiponomi->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tipos-nominas");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tipos-nominas");
                $this->view->disable();
            }
        }

    }
}

