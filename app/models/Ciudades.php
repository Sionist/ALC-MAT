<?php

class Ciudades extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_ciudad;

    /**
     *
     * @var integer
     */
    protected $id_estado;

    /**
     *
     * @var string
     */
    protected $ciudad;

    /**
     *
     * @var integer
     */
    protected $capital;

    /**
     * Method to set the value of field id_ciudad
     *
     * @param integer $id_ciudad
     * @return $this
     */
    public function setIdCiudad($id_ciudad)
    {
        $this->id_ciudad = $id_ciudad;

        return $this;
    }

    /**
     * Method to set the value of field id_estado
     *
     * @param integer $id_estado
     * @return $this
     */
    public function setIdEstado($id_estado)
    {
        $this->id_estado = $id_estado;

        return $this;
    }

    /**
     * Method to set the value of field ciudad
     *
     * @param string $ciudad
     * @return $this
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Method to set the value of field capital
     *
     * @param integer $capital
     * @return $this
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Returns the value of field id_ciudad
     *
     * @return integer
     */
    public function getIdCiudad()
    {
        return $this->id_ciudad;
    }

    /**
     * Returns the value of field id_estado
     *
     * @return integer
     */
    public function getIdEstado()
    {
        return $this->id_estado;
    }

    /**
     * Returns the value of field ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Returns the value of field capital
     *
     * @return integer
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_ciudad', 'Datospersonales', 'lugar_nac', array('alias' => 'Datospersonales'));
        $this->belongsTo('id_estado', 'Estados', 'id_estado', array('alias' => 'Estados'));
        $this->belongsTo('id_estado', 'Estados', 'id_estado', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ciudades';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ciudades[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ciudades
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
