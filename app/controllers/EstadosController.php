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
    public function editarAction($id)
    {
        if (!$this->request->isPost()) {

            //se llama al metodo de consulta por id de estado
            $estado = Estados::findFirstByIdEstado($id);

            //si no hay registros se genera un error y se carga index otra vez
            if (!$estado) {
                $this->flash->Error("Estado No Encontrado");
                return $this->dispatcher->forward(array(
                    'controller' => 'estados',
                    'action' => 'index'
                ));
            }

            //se envian los datos a los campos del formulario
            $this->tag->setDefault("id", $estado->getIdEstado());
            $this->tag->setDefault("estado", $estado->getEstado());
        }
    }

    /**
     * @param $id
     */
    public function editadoAction(){
        //se recibe el valor del id pasado por POST
        $id = $this->request->getPost("id");

        //se recupera el estado por su id
        $estado = Estados::findFirstByIdEstado($id);

        //se evalua si la peticion vino por POST
        if(!$this->request->isPost()){
                $this->dispatcher->forward(array(
                    'controller'=>'estados',
                    'action'=>'index'
                ));
            }else{
                //se evalua si existe el estado solicitado
                if(!$estado){
                    $this->flash->error("No se ha encontrado el estado");

                    return $this->dispatcher->forward(array(
                        'controller'=>'estados',
                        'action'=>'index'
                    ));
                }else{
                    //se guarda el estado
                    $estado->setEstado($this->request->getPost("estado"));

                    //se evalua si se concreta la persitencia en la BD
                    if(!$estado->save()){

                        foreach ($estado->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        //se retorna la vista con el parametro de entrada del metodo
                        return $this->dispacther->forward(array(
                            'controller'=>'estados',
                            'action'=>'editar',
                            'params'=>$id
                        ));
                    }else{
                        //se recarga la vista index del controlador estados con los datos modificados
                        return $this->response->redirect("estados/index");
                    }
                }
            }
        }
}

