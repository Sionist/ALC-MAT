<?php

class CargafamiliarController extends \Phalcon\Mvc\Controller
{
	
   public function initialize()
	{
		$this->view->setTemplateAfter('blank');
	}

   public function indexAction()
    {
	//$ciudades = Ciudades::find();
    $query = new Phalcon\Mvc\Model\Query("SELECT datospersonales.nu_cedula, datospersonales.nombre1 as nombret, datospersonales.apellido1 as apellidot, cargafamiliar.ci_carga, cargafamiliar.nombre1, cargafamiliar.apellido1, cargafamiliar.f_nac, cargafamiliar.ocupacion, cargafamiliar.genero, cargafamiliar.id_parentesco, parentesco.parentesco as parent FROM cargafamiliar INNER JOIN datospersonales ON datospersonales.nu_cedula=cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco", $this->getDI()); 
	
	$cargafamiliar = $query->execute();
		
		
    $this->view->setParamToView("carga", $cargafamiliar);
    }
	
	public function individualAction($cedula)
    {
        $this->verificarPermisos->verificar();

        //$ciudades = Ciudades::find();
        $query = new Phalcon\Mvc\Model\Query("SELECT Datospersonales.nu_cedula as tra_cedula, Datospersonales.nombre1 as nombret, Datospersonales.apellido1 as apellidot, Cargafamiliar.id_carga, Cargafamiliar.ci_carga, Cargafamiliar.nombre1, Cargafamiliar.apellido1, Cargafamiliar.f_nac, Cargafamiliar.ocupacion, Cargafamiliar.genero, Cargafamiliar.id_parentesco, Parentesco.parentesco as parent FROM Cargafamiliar INNER JOIN Datospersonales ON Datospersonales.nu_cedula=Cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco WHERE Cargafamiliar.nu_cedula=$cedula", $this->getDI());

        $cargafamiliar = $query->execute();

        $dtrabajador = Datospersonales::findFirstByNuCedula($cedula);
        $cedutra=$dtrabajador->nu_cedula;
        $nombre=$dtrabajador->nu_cedula;

        $this->view->setParamToView("carga", $cargafamiliar);
        $this->view->setParamToView("trabaja", $dtrabajador);
    }
	
    public function detalleAction()
    {
        $this->verificarPermisos->verificar();

        $idcarga = $this->dispatcher->getParam("id");
        //$ciudades = Ciudades::find();
       // $query = new Phalcon\Mvc\Model\Query("SELECT Datospersonales.nu_cedula as tra_cedula, Datospersonales.nombre1 as nombret, Datospersonales.apellido1 as apellidot, Cargafamiliar.ci_carga, Cargafamiliar.nombre1, Cargafamiliar.apellido1, Cargafamiliar.f_nac, Cargafamiliar.ocupacion, Cargafamiliar.genero, Cargafamiliar.id_parentesco, Parentesco.parentesco as parent FROM Cargafamiliar INNER JOIN Datospersonales ON Datospersonales.nu_cedula=Cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco WHERE Cargafamiliar.id_carga=$idcarga", $this->getDI());

        //$cargafamiliar = $query->execute();

        //$cedula=$cargafamiliar->tra_cedula;

        $dcarga = Cargafamiliar::findFirstByIdCarga($idcarga);
        $cedutra=$dcarga->nu_cedula;
        $ceducarga=$dcarga->ci_carga;
        $nombre=$dcarga->nombre1;
        $parent=$dcarga->id_parentesco;

        $discapacidad= $this->modelsManager->createBuilder()
            ->from("Discapacidad")
            ->columns("discapacidad")
            ->where("id_discapacid = :id:", array("id" => $dcarga->id_discapacidad))
            ->getQuery()
            ->execute()
            ->toArray();

        $dparent = Parentesco::findFirstByIdParentesco($parent);

        $this->view->setVar("discapacidad", $discapacidad);
        $this->view->setParamToView("carga", $dcarga);
        $this->view->setParamToView("parentesco", $dparent);
    }
	
	public function nuevoAction($cedula){
        $this->verificarPermisos->verificar();

        //$ciudades = Ciudades::find();
        //$query = new Phalcon\Mvc\Model\Query("SELECT Datospersonales.nu_cedula as tra_cedula, Datospersonales.nombre1 as nombret, Datospersonales.apellido1 as apellidot, Cargafamiliar.ci_carga, Cargafamiliar.nombre1, Cargafamiliar.apellido1, Cargafamiliar.f_nac, Cargafamiliar.ocupacion, Cargafamiliar.genero, Cargafamiliar.id_parentesco, Parentesco.parentesco as parent FROM Cargafamiliar INNER JOIN Datospersonales ON Datospersonales.nu_cedula=Cargafamiliar.nu_cedula INNER JOIN Parentesco ON Cargafamiliar.id_parentesco=Parentesco.id_parentesco WHERE Cargafamiliar.nu_cedula=$cedula", $this->getDI());

        // $cargafamiliar = $query->execute();

        $dtrabajador = Datospersonales::findFirstByNuCedula($cedula);
        $this->tag->setDefault("nu_cedula",$dtrabajador->nu_cedula);
        $nombre=$dtrabajador->nu_cedula;

       // $this->view->setParamToView("carga", $cargafamiliar);
        /*$this->response->redirect("trabajadores/carga-familiar/nueva-carga/$cedula");*/
        $this->view->setParamToView("trabaja", $dtrabajador);
        /*$this->view->disable();*/
    }
	
	

    public function guardanuevoAction(){
        $cedula = $this->request->getPost("nu_cedula");
        $cargafam = new Cargafamiliar();

        $cargafam->setNuCedula($cedula);
        $cargafam->setCiCarga($this->request->getPost("ci_carga"));
        $cargafam->setNombre1($this->request->getPost("nombre1"));
        $cargafam->setNombre2($this->request->getPost("nombre2"));
        $cargafam->setApellido1($this->request->getPost("apellido1"));
        $cargafam->setApellido2($this->request->getPost("apellido2"));

        $cargafam->setFNac($this->request->getPost("f_nac"));
        $cargafam->setOcupacion($this->request->getPost("ocupacion"));
        $cargafam->setGenero($this->request->getPost("genero"));
        $cargafam->setIdParentesco($this->request->getPost("id_parentesco"));
        $cargafam->setIdDiscapacidad($this->request->getPost("id_discapacidad"));
        $cargafam->setFotoCarga($this->request->getPost("foto_carga"));

        if (!$cargafam->save()) {
                foreach ($cargafam->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                $this->response->redirect("trabajadores/ver/$cedula/carga-familiar/nueva-carga/$cedula");
                $this->tag->setDefault("nu_cedula",$cedula);
                $this->view->disable();
            }else{
                $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha guardado exitosamente</strong></p></div>");
                //$this->response->redirect("trabajadores/ver/$cedula/carga-familiar");
                //$this->view->disable();
        }

        if($this->request->hasFiles() == true){

            $id_carga = $this->modelsManager->createBuilder()
                ->from("Cargafamiliar")
                ->columns("MAX(id_carga) as id")
                ->where("nu_cedula = :cedula:", array("cedula" => $cedula))
                ->getQuery()
                ->execute()
                ->toArray();

            $id_carga = $id_carga[0]["id"];
            $foto =$cedula . $id_carga.'.';
            $directorio = "C:/xampp/htdocs/sistenomialc/public/cargafamiliar/fotos/".$foto;

            foreach($this->request->getUploadedFiles() as $file){
                if($file->getRealType() == "image/png" || $file->getRealType() == "image/jpg" || $file->getRealType() == "image/jpeg"){
                    if($file->getSize() <= 2048000){
                        $foto.=$file->getExtension();
                        $directorio.=$file->getExtension();
                        $file->moveTo($directorio);
                        $carga = Cargafamiliar::findFirstByIdCarga($id_carga);
                        $carga->setFotoCarga($foto);
                        $carga->save();
                        $this->response->redirect("trabajadores/ver/$cedula/carga-familiar");
                        $this->view->disable();
                    }
                }else{

                }
            }
        }
    }

    public function editarAction(){
        $this->verificarPermisos->verificar();

        $id_carga = $this->dispatcher->getParam("id");
        $cedula = $this->dispatcher->getParam("cedula");

        $dtrabajador = Datospersonales::findFirstByNuCedula($cedula);

        $this->tag->setDefault("id_carga",$id_carga);
        $this->tag->setDefault("nu_cedula",$cedula);
        $this->view->setVar("dtrabajador",$dtrabajador);

        $carga = Cargafamiliar::findFirstByIdCarga($id_carga);
        $this->tag->setDefault("id_carga",$id_carga);
        $this->tag->setDefault("cedula",$id_carga);
        $this->tag->setDefault("ci_carga", $carga->ci_carga);
        $this->tag->setDefault("nombre1", $carga->nombre1);
        $this->tag->setDefault("nombre2", $carga->nombre2);
        $this->tag->setDefault("apellido1", $carga->apellido1);
        $this->tag->setDefault("apellido2", $carga->apellido2);

        $this->view->setVar("f_nac", date("d-m-Y",strtotime($carga->f_nac)));

        $this->tag->setDefault("ocupacion", $carga->ocupacion);
        $this->tag->setDefault("genero", $carga->genero);
        $this->tag->setDefault("id_parentesco", $carga->id_parentesco);
        $this->tag->setDefault("id_discapacidad", $carga->id_discapacidad);
    }

    public function editadoAction(){
        $cedula = $this->request->getPost("nu_cedula");
        $id_carga = $this->request->getPost("id_carga");

        $cargafam = Cargafamiliar::findFirstByIdCarga($id_carga);

        $cargafam->setCiCarga($this->request->getPost("ci_carga"));
        $cargafam->setNombre1($this->request->getPost("nombre1"));
        $cargafam->setNombre2($this->request->getPost("nombre2"));
        $cargafam->setApellido1($this->request->getPost("apellido1"));
        $cargafam->setApellido2($this->request->getPost("apellido2"));

        $cargafam->setFNac(date("Y-m-d",strtotime($this->request->getPost("f_nac"))));
        $cargafam->setOcupacion($this->request->getPost("ocupacion"));
        $cargafam->setGenero($this->request->getPost("genero"));
        $cargafam->setIdParentesco($this->request->getPost("id_parentesco"));
        $cargafam->setIdDiscapacidad($this->request->getPost("id_discapacidad"));

        //$this->subir_foto($this->request->getPost('imagen'),$cedula,$id_carga);

        if (!$cargafam->save()) {
            foreach ($cargafam->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            $this->response->redirect("trabajadores/ver/$cedula/carga-familiar/editar/$id_carga");
            $this->tag->setDefault("nu_cedula",$cedula);
            $this->view->disable();
        }else{
            $this->flashSession->success("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button><p><strong><i class='ace-icon fa fa-check'></i>Se ha modificado exitosamente</strong></p></div>");
            $this->response->redirect("trabajadores/ver/$cedula/carga-familiar");
            $this->view->disable();
        }
    }

    private function subir_fotos($imagen,$cedula, $id){
        if(isset($imagen)) {
            $size = $_FILES[$imagen]['size'];
            $file_name = $_FILES[$imagen]['name'];
            $jpg = $_FILES[$imagen]['type'];
            $directorio = "../../public/cargafamiliar/fotos/";
            $extension = "";
            if ($size > 2048000) {
                return "La imagen/foto no puede ser mayor a 2 MB.";
            }

            if (!$_FILES[$imagen]['type'] == "image/jpg") {
                return "La imagen/foto debe estar en formato JPG o PNG.";
            } else {
                $extension = "jpg";
            }

            if (!$_FILES[$imagen]['type'] == "image/jpeg") {
                return "La imagen/foto debe estar en formato JPG/JPEG o PNG.";
            } else {
                $extension = "jpeg";
            }

            if (!$_FILES[$imagen]['type'] == "image/png") {
                return "La imagen/foto debe estar en formato JPG o PNG.";
            } else {
                $extension = "png";
            }

            $imagen_name = $cedula.$id;
            $directorio = $imagen_name.'.'.$extension;

            if (move_uploaded_file($_FILES[$imagen]['tmp_name'],$directorio)){
                return $imagen_name;
            }else{
                return "";
            }
        }

    }

}



