<?php

class EstadosController extends \Phalcon\Mvc\Controller
{	
	
	public function initialize()
    {
		// aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }

    public function indexAction()
    {
	// Aqui muestra todos los registros de la tabla discapacidad
		$estado = Estados::find();
        $this->view->setParamToView("estado", $estado);

    }

    /**
     * @param $id
     */
    public function editarAction($id){
        if(!$this->request->isPost()) {

            //se llama al metodo de consulta por id de estado
            $estado = Estados::findFirstByIdEstado($id);

            if(!$estado){
                $this->flash->Error("Estado No Encontrado");
                return $this->dispatcher->forward(array(
                    'controller' => 'estados',
                    'action' => 'index'
                ));
            }

            $this->tag->setDefault("id",$estado->getIdEstado());
            $this->tag->setDefault("estado", $estado->getEstado());
        }


    }
	
	

}

