<?php

class Maestroasignavaca extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_maestroasivaca;

    /**
     *
     * @var string
     */
    protected $concepto;

    /**
     *
     * @var string
     */
    protected $formulaasigvaca;

    /**
     * Method to set the value of field id_maestroasivaca
     *
     * @param integer $id_maestroasivaca
     * @return $this
     */
    public function setIdMaestroasivaca($id_maestroasivaca)
    {
        $this->id_maestroasivaca = $id_maestroasivaca;

        return $this;
    }

    /**
     * Method to set the value of field concepto
     *
     * @param string $concepto
     * @return $this
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Method to set the value of field formulaasigvaca
     *
     * @param string $formulaasigvaca
     * @return $this
     */
    public function setFormulaasigvaca($formulaasigvaca)
    {
        $this->formulaasigvaca = $formulaasigvaca;

        return $this;
    }

    /**
     * Returns the value of field id_maestroasivaca
     *
     * @return integer
     */
    public function getIdMaestroasivaca()
    {
        return $this->id_maestroasivaca;
    }

    /**
     * Returns the value of field concepto
     *
     * @return string
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Returns the value of field formulaasigvaca
     *
     * @return string
     */
    public function getFormulaasigvaca()
    {
        return $this->formulaasigvaca;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_maestroasivaca', 'Asignavaca', 'id_maestroasivaca', array('alias' => 'Asignavaca'));
        $this->belongsTo('id_maestroasivaca', 'Asignavaca', 'id_maestroasivaca', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'maestroasignavaca';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Maestroasignavaca[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Maestroasignavaca
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
