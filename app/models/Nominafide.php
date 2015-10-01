<?php

class Nominafide extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_nominafide;

    /**
     *
     * @var integer
     */
    protected $id_regnomina;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $monto_fide;

    /**
     * Method to set the value of field id_nominafide
     *
     * @param integer $id_nominafide
     * @return $this
     */
    public function setIdNominafide($id_nominafide)
    {
        $this->id_nominafide = $id_nominafide;

        return $this;
    }

    /**
     * Method to set the value of field id_regnomina
     *
     * @param integer $id_regnomina
     * @return $this
     */
    public function setIdRegnomina($id_regnomina)
    {
        $this->id_regnomina = $id_regnomina;

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
     * Method to set the value of field monto_fide
     *
     * @param integer $monto_fide
     * @return $this
     */
    public function setMontoFide($monto_fide)
    {
        $this->monto_fide = $monto_fide;

        return $this;
    }

    /**
     * Returns the value of field id_nominafide
     *
     * @return integer
     */
    public function getIdNominafide()
    {
        return $this->id_nominafide;
    }

    /**
     * Returns the value of field id_regnomina
     *
     * @return integer
     */
    public function getIdRegnomina()
    {
        return $this->id_regnomina;
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
     * Returns the value of field monto_fide
     *
     * @return integer
     */
    public function getMontoFide()
    {
        return $this->monto_fide;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_regnomina', 'Nominas', 'id_regnomina', array('alias' => 'Nominas'));
        $this->belongsTo('id_regnomina', 'Nominas', 'id_regnomina', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nominafide';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nominafide[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nominafide
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
