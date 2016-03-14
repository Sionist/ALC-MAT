<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsersController extends ControllerBase
{

    public function initialize()
    {
        // aqui se llama a la plantilla
        $this->view->setTemplateAfter('blank');    
    }
    /**
     * Index action
     */
    public function indexAction()
    {
        //$this->response->redirect("users");
        $this->persistent->parameters = null;
    }

    /**
     * Searches for users
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Users", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $users = Users::find($parameters);
        if (count($users) == 0) {
            $this->flash->notice("The search did not find any users");

            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $users,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a user
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $user = Users::findFirstByid($id);
            if (!$user) {
                $this->flash->error("user was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "users",
                    "action" => "index"
                ));
            }

            $this->view->id = $user->id;

            $this->tag->setDefault("id", $user->id);
            $this->tag->setDefault("username", $user->username);
            $this->tag->setDefault("password", $user->password);
            $this->tag->setDefault("name", $user->name);
            $this->tag->setDefault("email", $user->email);
            $this->tag->setDefault("created_at", $user->created_at);
            $this->tag->setDefault("active", $user->active);
            
        }
    }

    /**
     * Creates a new user
     */
    public function crearAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        $user = new Users();

        $user->setUsername($this->request->getPost("username"));
        $user->setPassword($this->security->hash($this->request->getPost("password")));
        $user->setName($this->request->getPost("name"));
        $user->setEmail($this->request->getPost("email", "email"));
        $user->setCreatedAt($this->request->getPost("created_at"));
        $user->setActive($this->request->getPost("active"));
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "new"
            ));
        }

        $this->flash->success("user was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "users",
            "action" => "index"
        ));

    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $user = Users::findFirstByid($id);
        if (!$user) {
            $this->flash->error("user does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        $user->username = $this->request->getPost("username");
        $user->password = $this->request->getPost("password");
        $user->name = $this->request->getPost("name");
        $user->email = $this->request->getPost("email", "email");
        $user->created_at = $this->request->getPost("created_at");
        $user->active = $this->request->getPost("active");
        

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "edit",
                "params" => array($user->id)
            ));
        }

        $this->flash->success("user was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "users",
            "action" => "index"
        ));

    }

    /**
     * Deletes a user
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $user = Users::findFirstByid($id);
        if (!$user) {
            $this->flash->error("user was not found");

            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "search"
            ));
        }

        $this->flash->success("user was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "users",
            "action" => "index"
        ));
    }

    public function cambiarClaveAction()
    {
        //llama a la vista
    }

    public function claveCambiadaAction()
    {
        if($this->request->isPost()){
            $user = Users::findFirstByUsername($this->request->getPost("username"));

            if($user && $this->request->getPost("claveNueva") == $this->request->getPost("claveConfirm") ){

                    if(strlen($this->request->getPost("claveNueva"))<6){
                        $this->flashSession->error("<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-close'></i>Su clave debe tener almenos 6 caracteres de longitud...</strong></p></div>");
                        $this->response->redirect("cambiar-clave");
                        $this->view->disable();
                    }else {
                        $user->setPassword($this->security->Hash($this->request->getPost("claveNueva")));

                        if (!$user->save()) {

                            foreach ($user->getMessages() as $message) {
                                $this->flashSession->error($message);
                            }
                            $this->response->redirect("cambiar-clave");
                            $this->view->disable();
                        } else {
                            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>La clave se ha modificado exitosamente</strong></p></div>");
                            $this->response->redirect("cambiar-clave");
                            $this->view->disable();
                        }
                    }
                }else{
                    $this->flashSession->error("<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-close'></i>Las claves no coinciden...</strong></p></div>");
                    $this->response->redirect("cambiar-clave");
                    $this->view->disable();
                }
            }
        }

}
