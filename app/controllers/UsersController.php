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
        $users = Users::find();
        $this->view->setVar("users",$users);
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
    public function nuevoAction()
    {

    }

    /**
     * Edits a user
     *
     * @param string $id
     */
    public function editarAction()
    {
        $id = $this->dispatcher->getParam("id");
        if (!$this->request->isPost()) {

            $user = Users::findFirstByid($id);
            if (!$user) {
                $this->flash->error("user was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "users",
                    "action" => "index"
                ));
            }

            $this->tag->setDefault("id", $user->getId());
            $this->tag->setDefault("usuario", $user->getUsername());
            //$this->tag->setDefault("clave", $user->getPassword());
            $this->tag->setDefault("nombre", $user->getNombre());
            $this->tag->setDefault("email", $user->getEmail());
            //$this->tag->setDefault("created_at", $user->created_at);
            //$this->tag->setDefault("estatus", );

            $this->view->setVar("estatus",$user->getEstatus());
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

        $user->setUsuario($this->request->getPost("username"));
        $user->setClave($this->security->hash($this->request->getPost("password")));
        $user->setNombre($this->request->getPost("nombre"));
        $user->setEmail($this->request->getPost("email"));
        //$user->setCreatedAt($this->request->getPost("created_at"));
        $user->setEstatus($this->request->getPost("estatus"));
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flashSession->error($message);
            }

            $this->response->redirect("userrss");
            $this->view->disable();
        }

        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Usuario creado exitosamente</strong></p></div>");
        $this->response->redirect("userrss");
        $this->view->disable();
    }

    /**
     * Saves a user edited
     *
     */
    public function editadoAction()
    {
        if (!$this->request->isPost()) {
            $this->flashSession->error("Peticion NO ES POST");
            $this->response->redirect("userrss");
            $this->view->disable();
        }

        $id = $this->request->getPost("id");

        $user = Users::findFirstById($id);
        if (!$user) {
            $this->flashSession->error("El usuario no existe");
            $this->response->redirect("userrss");
            $this->view->disable();
        }

        $user->username = $this->request->getPost("usuario");
        $user->password = $this->security->Hash($this->request->getPost("clave"));
        $user->nombre = $this->request->getPost("nombre");
        $user->email = $this->request->getPost("email", "email");
        //$user->created_at = $this->request->getPost("created_at");
        $user->estatus = $this->request->getPost("estatus");

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

        $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Usuario actualizado exitosamente</strong></p></div>");
        $this->response->redirect("userrss");
        $this->view->disable();
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
    public function userpermisosAction(){

        $grupos = $this->modelsManager->createBuilder()
            ->from("GrupoPermisos")
            ->columns("id,nombre")
            ->getQuery()
            ->execute();

        $g_permisos = array();

        foreach($grupos as $g){

            $cont = 0;

            $permisos = $this->modelsManager->createBuilder()
                ->from("Permisos")
                ->join("GrupoPermisos")
                ->columns("Permisos.id,Permisos.nombre,GrupoPermisos.id as gpid,GrupoPermisos.nombre as gpn")
                ->where("Permisos.grupo_id = :id:", array("id" => $g->id))
                ->getQuery()
                ->execute();

            foreach($permisos as $k => $p){
                $g_permisos[$g->nombre][$k]= $p;
            }

            $cont++;
        }

        $this->view->setVar("permisos", $g_permisos);
        $this->tag->setDefault("id",$this->dispatcher->getParam("id"));
    }

    public function asignarPermisosAction(){

        $userId = $this->request->getPost("id");

        $permisos = array();

        $permisos = $this->request->getPost("permisos");

        $user = Users::findFirstById($userId);

        if($user){
            foreach($permisos as $p){
                //$per = Permisos::findFirstById($p);
                $user_permisos = new UsuariosPermisos();
                $user_permisos->setUserId($userId);
                $user_permisos->setPermisoId($p);
                $user_permisos->save();
            }
        } else {
            $this->flashSession->error("El usuario no existe.");
            $this->response->redirect("userrss");
            $this->view->disable();
        }
    }
}
