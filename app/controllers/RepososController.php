<?php

class RepososController extends \Phalcon\Mvc\Controller
{

    public function initialize()
    {
    	$this->view->setTemplateAfter('blank'); 
    }


    public function indexAction()
	{
		
		//$reposos = NbReposo::FindfirstByIdReposo($idreposo);

		//$this->view->SetParamToView("reposos",$reposos);

    }


	public function guardarAction()
    {

        if ($this->request->isPost()) {
            $reposo = new NbReposo();
            $reposo->setNuCedula($this->request->getPost("ncedula"));
            $reposo->setFInicio($this->request->getPost("fini"));
            $reposo->setFFinal($this->request->getPost("ffinal"));
            $reposo->setDiagnostico($this->request->getPost("diagnostico"));


            if (!$reposo->save()) {
                foreach ($reposo->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward(array(
                    "controller" => "reposos",
                    "action" => "index"
                ));
            }
        }

        $this->flash->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Guardado con Exito</strong></p></div>");
        return $this->dispatcher->forward(array(
            "controller" => "reposos",
            "action" => "index"
        ));
    }

}

