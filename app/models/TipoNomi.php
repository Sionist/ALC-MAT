<?php

class TipoNomi extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_nomina;

    /**
     *
     * @var string
     */
    public $nomina;

    /**
     *
     * @var integer
     */
    public $frecuencia;

    /**
     * Method to set the value of field id_nomina
     *
     * @param integer $id_nomina
     * @return $this
     */
    public function setIdNomina($id_nomina)
    {
        $this->id_nomina = $id_nomina;

        return $this;
    }

    /**
     * Method to set the value of field nomina
     *
     * @param string $nomina
     * @return $this
     */
    public function setNomina($nomina)
    {
        $this->nomina = $nomina;

        return $this;
    }

    /**
     * Method to set the value of field frecuencia
     *
     * @param integer $frecuencia
     * @return $this
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Returns the value of field id_nomina
     *
     * @return integer
     */
    public function getIdNomina()
    {
        return $this->id_nomina;
    }

    /**
     * Returns the value of field nomina
     *
     * @return string
     */
    public function getNomina()
    {
        return $this->nomina;
    }

    /**
     * Returns the value of field frecuencia
     *
     * @return integer
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
        $this->hasMany('id_nomina', 'Datoscontratacion', 'tipo_nom', array('alias' => 'Datoscontratacion'));
        $this->belongsTo('frecuencia', 'Frecuencia', 'id_frecuencia', array('alias' => 'Frecuencia'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_nomi';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoNomi[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoNomi
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
