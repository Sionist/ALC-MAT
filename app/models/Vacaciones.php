<?php

class Vacaciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_vacaciones;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var string
     */
    protected $f_inic;

    /**
     *
     * @var string
     */
    protected $f_final;

    /**
     *
     * @var integer
     */
    protected $monto_viat;

    /**
     *
     * @var integer
     */
    protected $monto_general;

    /**
     *
     * @var integer
     */
    protected $semana_quin;

    /**
     * Method to set the value of field id_vacaciones
     *
     * @param integer $id_vacaciones
     * @return $this
     */
    public function setIdVacaciones($id_vacaciones)
    {
        $this->id_vacaciones = $id_vacaciones;

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
     * Method to set the value of field f_inic
     *
     * @param string $f_inic
     * @return $this
     */
    public function setFInic($f_inic)
    {
        $this->f_inic = $f_inic;

        return $this;
    }

    /**
     * Method to set the value of field f_final
     *
     * @param string $f_final
     * @return $this
     */
    public function setFFinal($f_final)
    {
        $this->f_final = $f_final;

        return $this;
    }

    /**
     * Method to set the value of field monto_viat
     *
     * @param integer $monto_viat
     * @return $this
     */
    public function setMontoViat($monto_viat)
    {
        $this->monto_viat = $monto_viat;

        return $this;
    }

    /**
     * Method to set the value of field monto_general
     *
     * @param integer $monto_general
     * @return $this
     */
    public function setMontoGeneral($monto_general)
    {
        $this->monto_general = $monto_general;

        return $this;
    }

    /**
     * Method to set the value of field semana_quin
     *
     * @param integer $semana_quin
     * @return $this
     */
    public function setSemanaQuin($semana_quin)
    {
        $this->semana_quin = $semana_quin;

        return $this;
    }

    /**
     * Returns the value of field id_vacaciones
     *
     * @return integer
     */
    public function getIdVacaciones()
    {
        return $this->id_vacaciones;
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
     * Returns the value of field f_inic
     *
     * @return string
     */
    public function getFInic()
    {
        return $this->f_inic;
    }

    /**
     * Returns the value of field f_final
     *
     * @return string
     */
    public function getFFinal()
    {
        return $this->f_final;
    }

    /**
     * Returns the value of field monto_viat
     *
     * @return integer
     */
    public function getMontoViat()
    {
        return $this->monto_viat;
    }

    /**
     * Returns the value of field monto_general
     *
     * @return integer
     */
    public function getMontoGeneral()
    {
        return $this->monto_general;
    }

    /**
     * Returns the value of field semana_quin
     *
     * @return integer
     */
    public function getSemanaQuin()
    {
        return $this->semana_quin;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_vacaciones', 'Asignavaca', 'id_vacaciones', array('alias' => 'Asignavaca'));
        $this->hasMany('id_vacaciones', 'Deduvaca', 'id_vacaciones', array('alias' => 'Deduvaca'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->hasMany('id_vacaciones', 'Asignavaca', 'id_vacaciones', NULL);
        $this->hasMany('id_vacaciones', 'Deduvaca', 'id_vacaciones', NULL);
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vacaciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vacaciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vacaciones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
