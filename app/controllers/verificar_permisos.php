<?php

class verificar_permisosController extends \Phalcon\Mvc\Controller
{
    public function verificar($permiso){

        $user = Users::findFirstByUsername($this->session->get("username"));

        $userid = $user->getId();

        $per = $this->modelsManager->createBuilder()
            ->from("UsuariosPermisos")
            ->join("Users","UsuariosPermisos.user_id = Users.id")
            ->join("Permisos","UsuariosPermisos.permiso.id = Permisos.id")
            ->columns("Permisos.nombre")
            ->where("Users.id = :u_id: && Permisos.nombre = :permiso:", array("u_id" => $userid, "permiso" => $permiso))
            ->getQuery()
            ->execute();

        if($per){
            echo "si";
        }
    }
}