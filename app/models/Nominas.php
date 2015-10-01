<?php

class Nominas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_regnomina;

    /**
     *
     * @var integer
     */
    protected $id_nomina;

    /**
     *
     * @var integer
     */
    protected $numero;

    /**
     *
     * @var string
     */
    protected $fecha_nomina;

    /**
     *
     * @var string
     */
    protected $fecha_desde;

    /**
     *
     * @var string
     */
    protected $fecha_hasta;

    /**
     * Method to set the value of field id_regnomina
     *
     * @param integer $id_regnomina
     * @return $this
     */
    public function setIdRegnomina($id_regnomina)
    {
        $this->id_regnomina = $id_regnomina;

        return $this;
    }

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
     * Method to set the value of field numero
     *
     * @param integer $numero
     * @return $this
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Method to set the value of field fecha_nomina
     *
     * @param string $fecha_nomina
     * @return $this
     */
    public function setFechaNomina($fecha_nomina)
    {
        $this->fecha_nomina = $fecha_nomina;

        return $this;
    }

    /**
     * Method to set the value of field fecha_desde
     *
     * @param string $fecha_desde
     * @return $this
     */
    public function setFechaDesde($fecha_desde)
    {
        $this->fecha_desde = $fecha_desde;

        return $this;
    }

    /**
     * Method to set the value of field fecha_hasta
     *
     * @param string $fecha_hasta
     * @return $this
     */
    public function setFechaHasta($fecha_hasta)
    {
        $this->fecha_hasta = $fecha_hasta;

        return $this;
    }

    /**
     * Returns the value of field id_regnomina
     *
     * @return integer
     */
    public function getIdRegnomina()
    {
        return $this->id_regnomina;
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
     * Returns the value of field numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Returns the value of field fecha_nomina
     *
     * @return string
     */
    public function getFechaNomina()
    {
        return $this->fecha_nomina;
    }

    /**
     * Returns the value of field fecha_desde
     *
     * @return string
     */
    public function getFechaDesde()
    {
        return $this->fecha_desde;
    }

    /**
     * Returns the value of field fecha_hasta
     *
     * @return string
     */
    public function getFechaHasta()
    {
        return $this->fecha_hasta;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_regnomina', 'Nominafide', 'id_regnomina', array('alias' => 'Nominafide'));
        $this->hasMany('id_regnomina', 'Nominafide', 'id_regnomina', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nominas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nominas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nominas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
