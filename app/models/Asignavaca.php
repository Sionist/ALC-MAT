<?php

class Asignavaca extends \Phalcon\Mvc\Model
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
    protected $id_maestroasivaca;

    /**
     *
     * @var integer
     */
    protected $montoasigna;

    /**
     *
     * @var integer
     */
    protected $id_asignavaca;

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
     * Method to set the value of field montoasigna
     *
     * @param integer $montoasigna
     * @return $this
     */
    public function setMontoasigna($montoasigna)
    {
        $this->montoasigna = $montoasigna;

        return $this;
    }

    /**
     * Method to set the value of field id_asignavaca
     *
     * @param integer $id_asignavaca
     * @return $this
     */
    public function setIdAsignavaca($id_asignavaca)
    {
        $this->id_asignavaca = $id_asignavaca;

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
     * Returns the value of field id_maestroasivaca
     *
     * @return integer
     */
    public function getIdMaestroasivaca()
    {
        return $this->id_maestroasivaca;
    }

    /**
     * Returns the value of field montoasigna
     *
     * @return integer
     */
    public function getMontoasigna()
    {
        return $this->montoasigna;
    }

    /**
     * Returns the value of field id_asignavaca
     *
     * @return integer
     */
    public function getIdAsignavaca()
    {
        return $this->id_asignavaca;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_maestroasivaca', 'Maestroasignavaca', 'id_maestroasivaca', array('alias' => 'Maestroasignavaca'));
        $this->belongsTo('id_vacaciones', 'Vacaciones', 'id_vacaciones', array('alias' => 'Vacaciones'));
        $this->hasMany('id_maestroasivaca', 'Maestroasignavaca', 'id_maestroasivaca', NULL);
        $this->belongsTo('id_vacaciones', 'Vacaciones', 'id_vacaciones', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'asignavaca';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Asignavaca[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Asignavaca
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
