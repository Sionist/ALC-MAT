<?php

class XpruebaController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->view->setTemplateAfter('blank');
    }

    public function indexAction()
    {

    }

    public function recibeJAction(){

        if($this->request->isPost()){
            $id = $this->request->getPost("valor");
            $clausula = Clausulas::findFirstByIdConvension($id);

            $clau = array();

            foreach($clausula as $row){

            }

            $response = new \Phalcon\Http\Response();

            $response->setStatusCode(200,"ok");
            $response->setContent(json_encode($clau));

            return $response->send();
            }
    }



}




