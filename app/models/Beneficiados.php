<?php

class Beneficiados extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_beneficiado;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $ci_beneficiado;

    /**
     *
     * @var string
     */
    protected $apellidos;

    /**
     *
     * @var string
     */
    protected $nombres;

    /**
     *
     * @var string
     */
    protected $f_nacimiento;

    /**
     *
     * @var integer
     */
    protected $id_embargo;

    /**
     * Method to set the value of field id_beneficiado
     *
     * @param integer $id_beneficiado
     * @return $this
     */
    public function setIdBeneficiado($id_beneficiado)
    {
        $this->id_beneficiado = $id_beneficiado;

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
     * Method to set the value of field ci_beneficiado
     *
     * @param integer $ci_beneficiado
     * @return $this
     */
    public function setCiBeneficiado($ci_beneficiado)
    {
        $this->ci_beneficiado = $ci_beneficiado;

        return $this;
    }

    /**
     * Method to set the value of field apellidos
     *
     * @param string $apellidos
     * @return $this
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Method to set the value of field nombres
     *
     * @param string $nombres
     * @return $this
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Method to set the value of field f_nacimiento
     *
     * @param string $f_nacimiento
     * @return $this
     */
    public function setFNacimiento($f_nacimiento)
    {
        $this->f_nacimiento = $f_nacimiento;

        return $this;
    }

    /**
     * Method to set the value of field id_embargo
     *
     * @param integer $id_embargo
     * @return $this
     */
    public function setIdEmbargo($id_embargo)
    {
        $this->id_embargo = $id_embargo;

        return $this;
    }

    /**
     * Returns the value of field id_beneficiado
     *
     * @return integer
     */
    public function getIdBeneficiado()
    {
        return $this->id_beneficiado;
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
     * Returns the value of field ci_beneficiado
     *
     * @return integer
     */
    public function getCiBeneficiado()
    {
        return $this->ci_beneficiado;
    }

    /**
     * Returns the value of field apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Returns the value of field nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Returns the value of field f_nacimiento
     *
     * @return string
     */
    public function getFNacimiento()
    {
        return $this->f_nacimiento;
    }

    /**
     * Returns the value of field id_embargo
     *
     * @return integer
     */
    public function getIdEmbargo()
    {
        return $this->id_embargo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
		$this->belongsTo('id_embargo', 'Nb_embargos', 'id_embargo', array('alias' => 'Nb_embargos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'beneficiados';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Beneficiados[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Beneficiados
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id_beneficiado' => 'id_beneficiado',
            'nu_cedula' => 'nu_cedula',
            'ci_beneficiado' => 'ci_beneficiado',
            'apellidos' => 'apellidos',
            'nombres' => 'nombres',
            'f_nacimiento' => 'f_nacimiento',
            'id_embargo' => 'id_embargo'
        );
    }

}
