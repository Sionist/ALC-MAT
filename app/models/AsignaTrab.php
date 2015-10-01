<?php

class AsignaTrab extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_asigtra;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $horas_dias;

    /**
     *
     * @var integer
     */
    protected $semana_quin;

    /**
     *
     * @var integer
     */
    protected $monto;

    /**
     * Method to set the value of field id_asigtra
     *
     * @param integer $id_asigtra
     * @return $this
     */
    public function setIdAsigtra($id_asigtra)
    {
        $this->id_asigtra = $id_asigtra;

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
     * Method to set the value of field horas_dias
     *
     * @param integer $horas_dias
     * @return $this
     */
    public function setHorasDias($horas_dias)
    {
        $this->horas_dias = $horas_dias;

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
     * Method to set the value of field monto
     *
     * @param integer $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Returns the value of field id_asigtra
     *
     * @return integer
     */
    public function getIdAsigtra()
    {
        return $this->id_asigtra;
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
     * Returns the value of field horas_dias
     *
     * @return integer
     */
    public function getHorasDias()
    {
        return $this->horas_dias;
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
     * Returns the value of field monto
     *
     * @return integer
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'asigna_trab';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AsignaTrab[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AsignaTrab
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
