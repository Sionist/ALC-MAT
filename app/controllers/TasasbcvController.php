<?php

class TasasbcvController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
        $this->verificarPermisos->verificar();

        $tasa=TasasBcv::Find();
		$this->view->SetParamToView("tasa",$tasa);
		$this->view->SetParamToView("mes",$tasa);
		$this->view->SetParamToView("yeartasa",$tasa);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$tasa = new TasasBcv();
			$tasa->setTasa($this->request->getpost("tasa"));
			$tasa->setMes($this->request->getpost("mes"));
			$tasa->setAnoTasa($this->request->getpost("yeartasa"));
			
			if (!$tasa->save()) {
                foreach ($tasa->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tasas-bcv");
                $this->view->disable();
            }
		}
        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("tasas-bcv");
        $this->view->disable();
	}


	public function editarAction($id) {
        $this->verificarPermisos->verificar();

        if (!$this->request->isPost()) {

            $tasa = TasasBcv::findFirstByIdTasa($id);
            if (!$tasa) {
                $this->flashSession->error("Tasa No Fue Encontrada");
                $this->response->redirect("tasas-bcv");
                $this->view->disable();
            }
            $this->view->id = $tasa->id_tasa;
            $this->tag->setDefault("id", $tasa->getIdTasa());
            $this->tag->setDefault("tasa", $tasa->getTasa());
			$this->tag->setDefault("mes", $tasa->getMes());
			$this->tag->setDefault("yeartasa", $tasa->getAnoTasa());
        }
	}

	
public function editadoAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost("id");
            $tasa = TasasBcv::findFirstByIdTasa($id);
            if (!$tasa) {
                $this->flashSession->error("Tasa No Existe " . $id);
                $this->response->redirect("tasas-bcv");
                $this->view->disable();
            }
            $tasa->setTasa($this->request->getPost("tasa"));
            $tasa->setMes($this->request->getPost("mes"));
            $tasa->setAnoTasa($this->request->getPost("yeartasa"));

            if (!$tasa->save()) {
                foreach ($tasa->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("tasas-bcv");
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
                $this->response->redirect("tasas-bcv");
                $this->view->disable();
            }
        }

    }

}

