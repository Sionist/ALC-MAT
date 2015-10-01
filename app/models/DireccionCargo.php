<?php

class DireccionCargo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_cargo;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $id_direcciones;

    /**
     * Method to set the value of field id_cargo
     *
     * @param integer $id_cargo
     * @return $this
     */
    public function setIdCargo($id_cargo)
    {
        $this->id_cargo = $id_cargo;

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
     * Method to set the value of field id_direcciones
     *
     * @param integer $id_direcciones
     * @return $this
     */
    public function setIdDirecciones($id_direcciones)
    {
        $this->id_direcciones = $id_direcciones;

        return $this;
    }

    /**
     * Returns the value of field id_cargo
     *
     * @return integer
     */
    public function getIdCargo()
    {
        return $this->id_cargo;
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
     * Returns the value of field id_direcciones
     *
     * @return integer
     */
    public function getIdDirecciones()
    {
        return $this->id_direcciones;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_cargo', 'Cargos_', 'id_cargo', array('alias' => 'Cargos_'));
        $this->belongsTo('id_direcciones', 'NbDireciones', 'id_direcciones', array('alias' => 'NbDireciones'));
        $this->belongsTo('id_cargo', 'Cargos_', 'id_cargo', array('foreignKey' => true));
        $this->belongsTo('id_direcciones', 'Nbdireciones', 'id_direcciones', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'direccion_cargo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DireccionCargo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DireccionCargo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
