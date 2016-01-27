<?php

class RepososController extends \Phalcon\Mvc\Controller

{
    public function initialize()
    {
    	$this->view->setTemplateAfter('blank'); 
    }

    public function indexAction($nu_cedula)
	{
		$dtrab = Datospersonales::findFirstByNuCedula($nu_cedula);

		$nombre1 = $dtrab->nombre1;
		$apellido1 = $dtrab->apellido1;

		$this->tag->setDefault("ncedula",$nu_cedula);

		$this->view->nombre1 = $nombre1;
		$this->view->apellido1 = $apellido1;
		$this->view->nu_cedula = $nu_cedula;

		$query = new Phalcon\Mvc\Model\Query("Select * from NbReposo where nu_cedula=".$nu_cedula."Order by id_reposo DESC",$this->getDI());
        
		$reposos = $query->execute();

		$this->view->SetParamToView("reposos",$reposos);
    }

	public function guardarAction()
    {
    	
        if ($this->request->isPost()) {

            $reposo = new NbReposo();

            $ncedula = $this->request->getPost("ncedula");

			$f = $this->request->getPost("fechainicio");

			$f_ini = date('Y-m-d',strtotime($f));

			$reposo->setFInicio($f_ini);

			$f = $this->request->getPost("fechafinal");

			$f_fin = date('Y-m-d',strtotime($f));
			$reposo->setFFinal($f_fin);

			$reposo->setNuCedula($this->request->getPost("ncedula"));
            $reposo->setDiagnostico($this->request->getPost("diagnostico"));


            if (!$reposo->save()) {
                foreach ($reposo->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("trabajadores/ver/$ncedula/reposos");
                $this->view->disable();
            }
        }

        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
        $this->response->redirect("trabajadores/ver/$ncedula/reposos");
        $this->view->disable();
    }


    public function editarAction()
    {
        $idreposo =  $this->dispatcher->getParam("id");

    	if (!$this->request->isPost()) {
            $reposo = NbReposo::findFirstByIdReposo($idreposo);

            $ncedula = $reposo->nu_cedula;
            $dtrab = Datospersonales::findFirstByNuCedula($ncedula);

            if (!$reposo) {
                $this->flashSession->error("Reposo NO Encontrado");
                $this->response->redirect("trabajadores/ver/$ncedula/reposos/");
                $this->view->disable();
            }

            $this->view->nombre1 = $dtrab->nombre1;
            $this->view->apellido1 = $dtrab->apellido1;

            $this->view->idreposo = $reposo->id_reposo;
            $this->view->ncedula = $reposo->nu_cedula;

            $this->tag->setDefault("idreposo", $reposo->getIdReposo());
            $this->tag->setDefault("ncedula", $reposo->getNuCedula());
            $f_ini = date('d-m-Y', strtotime($reposo->getFInicio()));
            $this->tag->setDefault("finicio", $f_ini);
            $f_fin = date('d-m-Y', strtotime($reposo->getFFinal()));
            $this->tag->setDefault("ffinal", $f_fin);
            $this->tag->setDefault("diagnostico", $reposo->getDiagnostico());
        }
    }


    public function editadoAction()
    {
    	if ($this->request->isPost())
    	{
    		$idreposo = $this->request->getPost("idreposo");
    		$ncedula = $this->request->getPost("ncedula");

    		$reposo = NbReposo::findFirstByIdReposo($idreposo);

    		if (!$reposo)
    		{
    			$this->flashSession->error("Reposo NO Encontrado");
                $this->response->redirect("trabajadores/ver/$ncedula/reposos");
                $this->view->disable();
            }
    		}

            $f_ini = date('Y-m-d',strtotime($this->request->getPost("finicio")));
    		$reposo->setFInicio($f_ini);
            $f_fin = date('Y-m-d',strtotime($this->request->getPost("ffinal")));
    		$reposo->setFFinal($f_fin);
    		$reposo->setDiagnostico($this->request->getPost("diagnostico"));

    		if (!$reposo->save())
    		{
    			foreach ($reposo->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("trabajadores/ver/$ncedula/reposos");
                $this->view->disable();
    		}

    		$this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
            $this->response->redirect("trabajadores/ver/$ncedula/reposos");
            $this->view->disable();

    	}
}

