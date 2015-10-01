<?php

class NivelCargo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_nivelcargo;

    /**
     *
     * @var string
     */
    protected $nivel_cargo;

    /**
     * Method to set the value of field id_nivelcargo
     *
     * @param integer $id_nivelcargo
     * @return $this
     */
    public function setIdNivelcargo($id_nivelcargo)
    {
        $this->id_nivelcargo = $id_nivelcargo;

        return $this;
    }

    /**
     * Method to set the value of field nivel_cargo
     *
     * @param string $nivel_cargo
     * @return $this
     */
    public function setNivelCargo($nivel_cargo)
    {
        $this->nivel_cargo = $nivel_cargo;

        return $this;
    }

    /**
     * Returns the value of field id_nivelcargo
     *
     * @return integer
     */
    public function getIdNivelcargo()
    {
        return $this->id_nivelcargo;
    }

    /**
     * Returns the value of field nivel_cargo
     *
     * @return string
     */
    public function getNivelCargo()
    {
        return $this->nivel_cargo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_nivelcargo', 'Cargos_', 'nivel', array('alias' => 'Cargos_'));
        $this->hasMany('id_nivelcargo', 'Cargos_', 'nivel', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nivel_cargo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NivelCargo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NivelCargo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
