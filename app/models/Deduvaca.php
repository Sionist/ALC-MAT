<?php

class Deduvaca extends \Phalcon\Mvc\Model
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
    protected $id_maestrodeduvaca;

    /**
     *
     * @var integer
     */
    protected $montodeduvaca;

    /**
     *
     * @var integer
     */
    protected $id_deduvaca;

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
     * Method to set the value of field montodeduvaca
     *
     * @param integer $montodeduvaca
     * @return $this
     */
    public function setMontodeduvaca($montodeduvaca)
    {
        $this->montodeduvaca = $montodeduvaca;

        return $this;
    }

    /**
     * Method to set the value of field id_deduvaca
     *
     * @param integer $id_deduvaca
     * @return $this
     */
    public function setIdDeduvaca($id_deduvaca)
    {
        $this->id_deduvaca = $id_deduvaca;

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
     * Returns the value of field id_maestrodeduvaca
     *
     * @return integer
     */
    public function getIdMaestrodeduvaca()
    {
        return $this->id_maestrodeduvaca;
    }

    /**
     * Returns the value of field montodeduvaca
     *
     * @return integer
     */
    public function getMontodeduvaca()
    {
        return $this->montodeduvaca;
    }

    /**
     * Returns the value of field id_deduvaca
     *
     * @return integer
     */
    public function getIdDeduvaca()
    {
        return $this->id_deduvaca;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_maestrodeduvaca', 'Maestrodeduvaca', 'id_maestrodeduvaca', array('alias' => 'Maestrodeduvaca'));
        $this->belongsTo('id_vacaciones', 'Vacaciones', 'id_vacaciones', array('alias' => 'Vacaciones'));
        $this->hasMany('id_maestrodeduvaca', 'Maestrodeduvaca', 'id_maestrodeduvaca', NULL);
        $this->belongsTo('id_vacaciones', 'Vacaciones', 'id_vacaciones', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'deduvaca';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Deduvaca[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Deduvaca
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
