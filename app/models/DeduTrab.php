<?php

class DeduTrab extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_dedutrab;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

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
     * Method to set the value of field id_dedutrab
     *
     * @param integer $id_dedutrab
     * @return $this
     */
    public function setIdDedutrab($id_dedutrab)
    {
        $this->id_dedutrab = $id_dedutrab;

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
     * Returns the value of field id_dedutrab
     *
     * @return integer
     */
    public function getIdDedutrab()
    {
        return $this->id_dedutrab;
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
        return 'dedu_trab';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DeduTrab[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DeduTrab
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
