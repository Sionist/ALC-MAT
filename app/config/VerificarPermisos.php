<?php

class VerificarPermisos extends \Phalcon\Mvc\Controller
{
    public function verificar(){

        if($this->session->has("username")) {

            //capturo url solicitada
            $url = $_SERVER["REQUEST_URI"];
            $var = "/sistenomialc";

            //elimino url base de solicitud
            $url_final = str_replace($var, "", $url);

            //sustituyo numeros en la solicitud por 'n'
            $url_final = preg_replace("/[0-9]+/", "n", $url_final);

            $username = $this->session->get("username");
            $user = Users::findFirstByUsername($username);
            $userid = $user->getId();

            $permiso = Permisos::findFirstByUrl($url_final);
            if ($permiso) {

                $per = $this->modelsManager->createBuilder()
                    ->from("UsuariosPermisos")
                    ->join("Users", "Users.id = UsuariosPermisos.user_id")
                    ->join("Permisos", "Permisos.id = UsuariosPermisos.permiso_id")
                    ->columns("Permisos.nombre")
                    ->where("UsuariosPermisos.user_id = :u_id: and UsuariosPermisos.permiso_id = :permiso:", array("u_id" => $userid, "permiso" => $permiso->getId()))
                    ->getQuery()
                    ->execute()
                    ->toArray();

                if (count($per) > 0) {
                    return true;
                } else {
                    return $this->dispatcher->forward(array(
                        "controller" => "Accesodenegado",
                        "action" => "index"
                    ));
                }
            }else{
                return $this->dispatcher->forward(array(
                    "controller" => "Accesodenegado",
                    "action" => "noExistePermiso"
                ));
            }
        }
    }
}