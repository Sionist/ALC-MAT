<?php

class DiasBonificacion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_diasbonificacion;

    /**
     *
     * @var integer
     */
    protected $mes_desde;

    /**
     *
     * @var integer
     */
    protected $mes_hasta;

    /**
     *
     * @var integer
     */
    protected $dias_bonificacion;

    /**
     * Method to set the value of field id_diasbonificacion
     *
     * @param integer $id_diasbonificacion
     * @return $this
     */
    public function setIdDiasbonificacion($id_diasbonificacion)
    {
        $this->id_diasbonificacion = $id_diasbonificacion;

        return $this;
    }

    /**
     * Method to set the value of field mes_desde
     *
     * @param integer $mes_desde
     * @return $this
     */
    public function setMesDesde($mes_desde)
    {
        $this->mes_desde = $mes_desde;

        return $this;
    }

    /**
     * Method to set the value of field mes_hasta
     *
     * @param integer $mes_hasta
     * @return $this
     */
    public function setMesHasta($mes_hasta)
    {
        $this->mes_hasta = $mes_hasta;

        return $this;
    }

    /**
     * Method to set the value of field dias_bonificacion
     *
     * @param integer $dias_bonificacion
     * @return $this
     */
    public function setDiasBonificacion($dias_bonificacion)
    {
        $this->dias_bonificacion = $dias_bonificacion;

        return $this;
    }

    /**
     * Returns the value of field id_diasbonificacion
     *
     * @return integer
     */
    public function getIdDiasbonificacion()
    {
        return $this->id_diasbonificacion;
    }

    /**
     * Returns the value of field mes_desde
     *
     * @return integer
     */
    public function getMesDesde()
    {
        return $this->mes_desde;
    }

    /**
     * Returns the value of field mes_hasta
     *
     * @return integer
     */
    public function getMesHasta()
    {
        return $this->mes_hasta;
    }

    /**
     * Returns the value of field dias_bonificacion
     *
     * @return integer
     */
    public function getDiasBonificacion()
    {
        return $this->dias_bonificacion;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'dias_bonificacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DiasBonificacion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DiasBonificacion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
