<?php

class Adelantos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_adelanto;

    /**
     *
     * @var string
     */
    protected $fecha_ini;

    /**
     *
     * @var string
     */
    protected $feccha_pago;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $monto;

    /**
     *
     * @var integer
     */
    protected $porcentaje;

    /**
     * Method to set the value of field id_adelanto
     *
     * @param integer $id_adelanto
     * @return $this
     */
    public function setIdAdelanto($id_adelanto)
    {
        $this->id_adelanto = $id_adelanto;

        return $this;
    }

    /**
     * Method to set the value of field fecha_ini
     *
     * @param string $fecha_ini
     * @return $this
     */
    public function setFechaIni($fecha_ini)
    {
        $this->fecha_ini = $fecha_ini;

        return $this;
    }

    /**
     * Method to set the value of field feccha_pago
     *
     * @param string $feccha_pago
     * @return $this
     */
    public function setFecchaPago($feccha_pago)
    {
        $this->feccha_pago = $feccha_pago;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
     * Method to set the value of field monto
     *
     * @param integer $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Method to set the value of field porcentaje
     *
     * @param integer $porcentaje
     * @return $this
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Returns the value of field id_adelanto
     *
     * @return integer
     */
    public function getIdAdelanto()
    {
        return $this->id_adelanto;
    }

    /**
     * Returns the value of field fecha_ini
     *
     * @return string
     */
    public function getFechaIni()
    {
        return $this->fecha_ini;
    }

    /**
     * Returns the value of field feccha_pago
     *
     * @return string
     */
    public function getFecchaPago()
    {
        return $this->feccha_pago;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Returns the value of field monto
     *
     * @return integer
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Returns the value of field porcentaje
     *
     * @return integer
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_adelanto', 'Fideicomiso', 'id_adelanto', array('alias' => 'Fideicomiso'));
        $this->belongsTo('id_adelanto', 'Fideicomiso', 'id_adelanto', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'adelantos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Adelantos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Adelantos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
