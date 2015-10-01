<?php

class Cargos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_cargo;

    /**
     *
     * @var string
     */
    public $cargo;

    /**
     *
     * @var integer
     */
    public $sueldo;

    /**
     *
     * @var integer
     */
    public $nivel;

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
     * Method to set the value of field cargo
     *
     * @param string $cargo
     * @return $this
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Method to set the value of field sueldo
     *
     * @param integer $sueldo
     * @return $this
     */
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    /**
     * Method to set the value of field nivel
     *
     * @param integer $nivel
     * @return $this
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

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
     * Returns the value of field cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Returns the value of field sueldo
     *
     * @return integer
     */
    public function getSueldo()
    {
        return $this->sueldo;
    }

    /**
     * Returns the value of field nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_cargo', 'Datoscontratacion', 't_cargo', array('alias' => 'Datoscontratacion'));
        $this->hasMany('id_cargo', 'DireccionCargo', 'id_cargo', array('alias' => 'DireccionCargo'));
        $this->belongsTo('nivel', 'NivelCargo', 'id_nivelcargo', array('alias' => 'NivelCargo'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cargos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id_cargo' => 'id_cargo',
            'cargo' => 'cargo',
            'sueldo' => 'sueldo',
            'nivel' => 'nivel'
        );
    }

}
