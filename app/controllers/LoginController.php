<?php

class LoginController extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		$this->view->setTemplateAfter('login');
	}
    public function indexAction()
    {

    }
	
	public function ingresoAction()
	{
	
		if($this->request->isPost()) {
		
		$username = $this->request->getPost('login' , 'string');
		$password = $this->request->getPost('clave');
		$user = Users::findFirstByUsername($username);
		if($user){
			if ($this->security->checkToken() && $this->security->checkHash($password, $user->password)) {
				$this->session->set('auth-identity', array(
				'usu_id' => $user->id,
				'usu-username' => $user->username
				));	
				
				if($user->id == 1)
					{
					return $this->response->redirect('Discapacidad');
					}
				
				} else {
			
					$this->flash->error("Error de Incio de Sesion");
					return $this->dispatcher->forward(array(
					"controler" => "login",
					"action" => "index"
					));
				}
				
		} else {
			
		$this->flash->error("Usuario o Password Invalidos");
			return $this->dispatcher->forward(array(
				"controler" => "login",
				"action" => "index"
				));	
		}
			
		}
		
	$this->flash->error("Debe ingresar un Usuario y Password validos");
			return $this->dispatcher->forward(array(
			"controler" => "login",
			"action" => "index"
			));	
	
	}
	
  public function salirAction()
  {
   $this->session->remove('auth-identity');
	return $this->response->redirect('login/index');  
  }

	
}

