<?php

class TipocobroController extends \Phalcon\Mvc\Controller
{

    public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}
	

    public function indexAction()
    {
		$cobro=TipoCobro::Find();
		$this->view->SetParamToView("cobro",$cobro);
    }


	public function guardarAction()
	{
		if ($this->request->isPost())
		{
			$cobro = new TipoCobro();
			$cobro->setNbCobro($this->request->getpost("cobro"));
			
			if (!$cobro->save()) {
                foreach ($cobro->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "tipocobro",
                    "action" => "index"
                ));
            }
			
		}
		
		
		$this->flash->success("<div class='alert alert-block alert-success'>Guardado con exito</div>");
        return $this->dispatcher->forward(array(
            "controller" => "tipocobro",
            "action" => "index"
        ));
		
		
	}


	public function editarAction($id) {
        if (!$this->request->isPost()) {

            $cobro = TipoCobro::findFirstByIdCobro($id);
            if (!$cobro) {
                $this->flash->error("Tipo de Cobro No Fue Encontrado");

                return $this->dispatcher->forward(array(
                    "controller" => "cobro",
                    "action" => "index"
                ));
            }

            $this->view->id = $cobro->id_cobro;

            $this->tag->setDefault("id", $cobro->getIdCobro());
            $this->tag->setDefault("cobro", $cobro->getNbCobro());
           
            /*Idniveldinst*/
        }
		
	}

	
public function editadoAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipocobro",
                "action" => "index"
            ));
        }
   
        $id = $this->request->getPost("id");

        $cobro = TipoCobro::findFirstByIdCobro($id);
        if (!$cobro) {
            $this->flash->error("Tipo de Cobro No Existe " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tipocobro",
                "action" => "index"
            ));
        }

        $cobro->setNbCobro($this->request->getPost("cobro"));
                

        if (!$cobro->save()) {

            foreach ($cobro->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipocobro",
                "action" => "editar",
                "params" => array($cobro->id_cobro)
            ));
        }

        $this->flash->success("Tipo de Cobro Actualizado");

       return $this->response->redirect('tipocobro/index');

    }  
}

