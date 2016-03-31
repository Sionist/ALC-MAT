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
				//$this->session->set('auth-identity', array(
				//'usu_id' => $user->id,
				//'usu-username' => $user->username));
	
				$this->session->set("username",$user->username);
				$this->session->set("admin",$user->admin);

				if($user->username == $username)
					{
                                   
					return $this->response->redirect('trabajadores');
					}
				
				} else {
					$this->flashSession->error("Error de Incio de Sesion");
					$this->response->redirect("login");
					$this->view->disable();
				}
				
		} else {
			$this->flashSession->error("Usuario o Password Invalidos");
			$this->response->redirect("login");
			$this->view->disable();
		}
			
		}
		$this->flashSession->error("Debe ingresar un Usuario y Password validos");
		$this->response->redirect("login");
		$this->view->disable();
	
	}
	
  public function salirAction()
  {
	   	$this->session->remove('auth-identity');
	  	return $this->response->redirect('login/index');
  }

	
}

