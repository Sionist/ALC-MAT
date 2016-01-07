<?php

class Datospersonales extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var string
     */
    protected $rif;

    /**
     *
     * @var string
     */
    protected $nombre1;

    /**
     *
     * @var string
     */
    protected $nombre2;

    /**
     *
     * @var string
     */
    protected $apellido1;

    /**
     *
     * @var string
     */
    protected $apellido2;

    /**
     *
     * @var string
     */
    protected $genero;

    /**
     *
     * @var string
     */
    protected $f_nac;

    /**
     *
     * @var string
     */
    protected $nacionalidad;

    /**
     *
     * @var integer
     */
    protected $lugar_nac;

    /**
     *
     * @var string
     */
    protected $telf_hab;

    /**
     *
     * @var string
     */
    protected $telf_cel;

    /**
     *
     * @var string
     */
    protected $dir_hab;

    /**
     *
     * @var string
     */
    protected $edo_civil;

    /**
     *
     * @var string
     */
    protected $correo_e;

    /**
     *
     * @var string
     */
    protected $foto_p;

    /**
     *
     * @var integer
     */
    protected $id_discapacidad;

    /**
     *
     * @var integer
     */
    protected $estatus;

    /**
     * Method to set the value of field nu_cedula
     *
     * @param integer $nu_cedula
     * @return $this
     */
    public function setNuCedula($nu_cedula)
    {
        $this->nu_cedula = $nu_cedula;

        return $this;
    }

    /**
     * Method to set the value of field rif
     *
     * @param string $rif
     * @return $this
     */
    public function setRif($rif)
    {
        $this->rif = $rif;

        return $this;
    }

    /**
     * Method to set the value of field nombre1
     *
     * @param string $nombre1
     * @return $this
     */
    public function setNombre1($nombre1)
    {
        $this->nombre1 = $nombre1;

        return $this;
    }

    /**
     * Method to set the value of field nombre2
     *
     * @param string $nombre2
     * @return $this
     */
    public function setNombre2($nombre2)
    {
        $this->nombre2 = $nombre2;

        return $this;
    }

    /**
     * Method to set the value of field apellido1
     *
     * @param string $apellido1
     * @return $this
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Method to set the value of field apellido2
     *
     * @param string $apellido2
     * @return $this
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Method to set the value of field genero
     *
     * @param string $genero
     * @return $this
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Method to set the value of field f_nac
     *
     * @param string $f_nac
     * @return $this
     */
    public function setFNac($f_nac)
    {
        $this->f_nac = $f_nac;

        return $this;
    }

    /**
     * Method to set the value of field nacionalidad
     *
     * @param string $nacionalidad
     * @return $this
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    /**
     * Method to set the value of field lugar_nac
     *
     * @param integer $lugar_nac
     * @return $this
     */
    public function setLugarNac($lugar_nac)
    {
        $this->lugar_nac = $lugar_nac;

        return $this;
    }

    /**
     * Method to set the value of field telf_hab
     *
     * @param string $telf_hab
     * @return $this
     */
    public function setTelfHab($telf_hab)
    {
        $this->telf_hab = $telf_hab;

        return $this;
    }

    /**
     * Method to set the value of field telf_cel
     *
     * @param string $telf_cel
     * @return $this
     */
    public function setTelfCel($telf_cel)
    {
        $this->telf_cel = $telf_cel;

        return $this;
    }

    /**
     * Method to set the value of field dir_hab
     *
     * @param string $dir_hab
     * @return $this
     */
    public function setDirHab($dir_hab)
    {
        $this->dir_hab = $dir_hab;

        return $this;
    }

    /**
     * Method to set the value of field edo_civil
     *
     * @param string $edo_civil
     * @return $this
     */
    public function setEdoCivil($edo_civil)
    {
        $this->edo_civil = $edo_civil;

        return $this;
    }

    /**
     * Method to set the value of field correo_e
     *
     * @param string $correo_e
     * @return $this
     */
    public function setCorreoE($correo_e)
    {
        $this->correo_e = $correo_e;

        return $this;
    }

    /**
     * Method to set the value of field foto_p
     *
     * @param string $foto_p
     * @return $this
     */
    public function setFotoP($foto_p)
    {
        $this->foto_p = $foto_p;

        return $this;
    }

    /**
     * Method to set the value of field id_discapacidad
     *
     * @param integer $id_discapacidad
     * @return $this
     */
    public function setIdDiscapacidad($id_discapacidad)
    {
        $this->id_discapacidad = $id_discapacidad;

        return $this;
    }

    /**
     * Method to set the value of field estatus
     *
     * @param integer $estatus
     * @return $this
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Returns the value of field nu_cedula
     *
     * @return integer
     */
    public function getNuCedula()
    {
        return $this->nu_cedula;
    }

    /**
     * Returns the value of field rif
     *
     * @return string
     */
    public function getRif()
    {
        return $this->rif;
    }

    /**
     * Returns the value of field nombre1
     *
     * @return string
     */
    public function getNombre1()
    {
        return $this->nombre1;
    }

    /**
     * Returns the value of field nombre2
     *
     * @return string
     */
    public function getNombre2()
    {
        return $this->nombre2;
    }

    /**
     * Returns the value of field apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Returns the value of field apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Returns the value of field genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Returns the value of field f_nac
     *
     * @return string
     */
    public function getFNac()
    {
        return $this->f_nac;
    }

    /**
     * Returns the value of field nacionalidad
     *
     * @return string
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Returns the value of field lugar_nac
     *
     * @return integer
     */
    public function getLugarNac()
    {
        return $this->lugar_nac;
    }

    /**
     * Returns the value of field telf_hab
     *
     * @return string
     */
    public function getTelfHab()
    {
        return $this->telf_hab;
    }

    /**
     * Returns the value of field telf_cel
     *
     * @return string
     */
    public function getTelfCel()
    {
        return $this->telf_cel;
    }

    /**
     * Returns the value of field dir_hab
     *
     * @return string
     */
    public function getDirHab()
    {
        return $this->dir_hab;
    }

    /**
     * Returns the value of field edo_civil
     *
     * @return string
     */
    public function getEdoCivil()
    {
        return $this->edo_civil;
    }

    /**
     * Returns the value of field correo_e
     *
     * @return string
     */
    public function getCorreoE()
    {
        return $this->correo_e;
    }

    /**
     * Returns the value of field foto_p
     *
     * @return string
     */
    public function getFotoP()
    {
        return $this->foto_p;
    }

    /**
     * Returns the value of field id_discapacidad
     *
     * @return integer
     */
    public function getIdDiscapacidad()
    {
        return $this->id_discapacidad;
    }

    /**
     * Returns the value of field estatus
     *
     * @return integer
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('nu_cedula', 'AsignaTrab', 'nu_cedula', array('alias' => 'AsignaTrab'));
        $this->hasMany('nu_cedula', 'Beneficiados', 'nu_cedula', array('alias' => 'Beneficiados'));
        $this->hasMany('nu_cedula', 'Datoscontratacion', 'nu_cedula', array('alias' => 'Datoscontratacion'));
        $this->hasMany('nu_cedula', 'Datosfinancieros', 'nu_cedula', array('alias' => 'Datosfinancieros'));
        $this->hasMany('nu_cedula', 'Datosprofesiona', 'nu_cedula', array('alias' => 'Datosprofesiona'));
        $this->hasMany('nu_cedula', 'DeduTrab', 'nu_cedula', array('alias' => 'DeduTrab'));
        $this->hasMany('nu_cedula', 'DoctrabBeneficio', 'nu_cedula', array('alias' => 'DoctrabBeneficio'));
        $this->hasMany('nu_cedula', 'NbDeudas', 'nu_cedula', array('alias' => 'NbDeudas'));
        $this->hasMany('nu_cedula', 'NbReposo', 'nu_cedula', array('alias' => 'NbReposo'));
        $this->hasMany('nu_cedula', 'NbViaticos', 'nu_cedula', array('alias' => 'NbViaticos'));
        $this->hasMany('nu_cedula', 'TrabajoAsi', 'nu_cedula', array('alias' => 'TrabajoAsi'));
        $this->hasMany('nu_cedula', 'TrabajoDedu', 'nu_cedula', array('alias' => 'TrabajoDedu'));
        $this->hasMany('nu_cedula', 'Vacaciones', 'nu_cedula', array('alias' => 'Vacaciones'));
        $this->hasMany('nu_cedula', 'Variaciones', 'nu_cedula', array('alias' => 'Variaciones'));
        $this->belongsTo('lugar_nac', 'Ciudades', 'id_ciudad', array('alias' => 'Ciudades'));
        $this->belongsTo('id_discapacidad', 'Discapacidad', 'id_discapacid', array('alias' => 'Discapacidad'));
        $this->belongsTo('estatus', 'EstatusT', 'id_estat', array('alias' => 'EstatusT'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'datospersonales';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datospersonales[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datospersonales
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
