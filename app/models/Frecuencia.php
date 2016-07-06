<?php

class Frecuencia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_frecuencia;

    /**
     *
     * @var string
     */
    protected $frecuencia;

    /**
     * Method to set the value of field id_frecuencia
     *
     * @param integer $id_frecuencia
     * @return $this
     */
    public function setIdFrecuencia($id_frecuencia)
    {
        $this->id_frecuencia = $id_frecuencia;

        return $this;
    }

    /**
     * Method to set the value of field frecuencia
     *
     * @param string $frecuencia
     * @return $this
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Returns the value of field id_frecuencia
     *
     * @return integer
     */
    public function getIdFrecuencia()
    {
        return $this->id_frecuencia;
    }

    /**
     * Returns the value of field frecuencia
     *
     * @return string
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_frecuencia', 'NbAsignaciones', 'frecuencia', array('alias' => 'NbAsignaciones'));
        $this->hasMany('id_frecuencia', 'NbDeducciones', 'id_frecuencia', array('alias' => 'NbDeducciones'));
        $this->hasMany('id_frecuencia', 'NbDeudas', 'frecuencia', array('alias' => 'NbDeudas'));
        $this->hasMany('id_frecuencia', 'TipoNomi', 'frecuencia', array('alias' => 'TipoNomi'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'frecuencia';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Frecuencia[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Frecuencia
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
