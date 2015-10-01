<?php

class Maestrodeduvaca extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_maestrodeduvaca;

    /**
     *
     * @var string
     */
    protected $concepto;

    /**
     *
     * @var string
     */
    protected $formuladeduvaca;

    /**
     * Method to set the value of field id_maestrodeduvaca
     *
     * @param integer $id_maestrodeduvaca
     * @return $this
     */
    public function setIdMaestrodeduvaca($id_maestrodeduvaca)
    {
        $this->id_maestrodeduvaca = $id_maestrodeduvaca;

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
     * Method to set the value of field formuladeduvaca
     *
     * @param string $formuladeduvaca
     * @return $this
     */
    public function setFormuladeduvaca($formuladeduvaca)
    {
        $this->formuladeduvaca = $formuladeduvaca;

        return $this;
    }

    /**
     * Returns the value of field id_maestrodeduvaca
     *
     * @return integer
     */
    public function getIdMaestrodeduvaca()
    {
        return $this->id_maestrodeduvaca;
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
     * Returns the value of field formuladeduvaca
     *
     * @return string
     */
    public function getFormuladeduvaca()
    {
        return $this->formuladeduvaca;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_maestrodeduvaca', 'Deduvaca', 'id_maestrodeduvaca', array('alias' => 'Deduvaca'));
        $this->belongsTo('id_maestrodeduvaca', 'Deduvaca', 'id_maestrodeduvaca', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'maestrodeduvaca';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Maestrodeduvaca[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Maestrodeduvaca
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
