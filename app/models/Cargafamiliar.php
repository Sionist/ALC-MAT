<?php

class Cargafamiliar extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_carga;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $ci_carga;

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
    protected $f_nac;

    /**
     *
     * @var string
     */
    protected $ocupacion;

    /**
     *
     * @var string
     */
    protected $genero;

    /**
     *
     * @var integer
     */
    protected $id_parentesco;
	
	 /**
     *
     * @var integer
     */
    protected $foto_carga;

    /**
     * Method to set the value of field id_carga
     *
     * @param integer $id_carga
     * @return $this
     */
    public function setIdCarga($id_carga)
    {
        $this->id_carga = $id_carga;

        return $this;
    }

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
     * Method to set the value of field ci_carga
     *
     * @param integer $ci_carga
     * @return $this
     */
    public function setCiCarga($ci_carga)
    {
        $this->ci_carga = $ci_carga;

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
     * Method to set the value of field ocupacion
     *
     * @param string $ocupacion
     * @return $this
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

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
     * Method to set the value of field id_parentesco
     *
     * @param integer $id_parentesco
     * @return $this
     */
    public function setIdParentesco($id_parentesco)
    {
        $this->id_parentesco = $id_parentesco;

        return $this;
    }
	
	public function setFotoCarga($foto_carga)
    {
        $this->foto_carga = $foto_carga;

        return $this;
    }

    /**
     * Returns the value of field id_carga
     *
     * @return integer
     */
    public function getIdCarga()
    {
        return $this->id_carga;
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
     * Returns the value of field ci_carga
     *
     * @return integer
     */
    public function getCiCarga()
    {
        return $this->ci_carga;
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
     * Returns the value of field f_nac
     *
     * @return string
     */
    public function getFNac()
    {
        return $this->f_nac;
    }

    /**
     * Returns the value of field ocupacion
     *
     * @return string
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
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
     * Returns the value of field id_parentesco
     *
     * @return integer
     */
    public function getIdParentesco()
    {
        return $this->id_parentesco;
    }

	
	public function getFotoCarga()
    {
       return $this->foto_carga;
    }
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datoscontratacion', 'nu_cedula', array('alias' => 'Datoscontratacion'));
        $this->belongsTo('id_parentesco', 'Parentesco', 'id_parentesco', array('alias' => 'Parentesco'));
        $this->belongsTo('nu_cedula', 'Datoscontratacion', 'nu_cedula', array('foreignKey' => true));
        $this->belongsTo('id_parentesco', 'Parentesco', 'id_parentesco', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cargafamiliar';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargafamiliar[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargafamiliar
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
