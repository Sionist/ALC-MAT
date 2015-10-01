<?php

class NbDeudas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_deuda;

    /**
     *
     * @var integer
     */
    protected $id_descuent;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $monto_inicial;

    /**
     *
     * @var integer
     */
    protected $cuotas;

    /**
     *
     * @var integer
     */
    protected $frecuencia;

    /**
     *
     * @var integer
     */
    protected $saldo;

    /**
     *
     * @var string
     */
    protected $f_compromiso;

    /**
     *
     * @var integer
     */
    protected $n_cuotas;

    /**
     * Method to set the value of field id_deuda
     *
     * @param integer $id_deuda
     * @return $this
     */
    public function setIdDeuda($id_deuda)
    {
        $this->id_deuda = $id_deuda;

        return $this;
    }

    /**
     * Method to set the value of field id_descuent
     *
     * @param integer $id_descuent
     * @return $this
     */
    public function setIdDescuent($id_descuent)
    {
        $this->id_descuent = $id_descuent;

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
     * Method to set the value of field monto_inicial
     *
     * @param integer $monto_inicial
     * @return $this
     */
    public function setMontoInicial($monto_inicial)
    {
        $this->monto_inicial = $monto_inicial;

        return $this;
    }

    /**
     * Method to set the value of field cuotas
     *
     * @param integer $cuotas
     * @return $this
     */
    public function setCuotas($cuotas)
    {
        $this->cuotas = $cuotas;

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
     * Method to set the value of field saldo
     *
     * @param integer $saldo
     * @return $this
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Method to set the value of field f_compromiso
     *
     * @param string $f_compromiso
     * @return $this
     */
    public function setFCompromiso($f_compromiso)
    {
        $this->f_compromiso = $f_compromiso;

        return $this;
    }

    /**
     * Method to set the value of field n_cuotas
     *
     * @param integer $n_cuotas
     * @return $this
     */
    public function setNCuotas($n_cuotas)
    {
        $this->n_cuotas = $n_cuotas;

        return $this;
    }

    /**
     * Returns the value of field id_deuda
     *
     * @return integer
     */
    public function getIdDeuda()
    {
        return $this->id_deuda;
    }

    /**
     * Returns the value of field id_descuent
     *
     * @return integer
     */
    public function getIdDescuent()
    {
        return $this->id_descuent;
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
     * Returns the value of field monto_inicial
     *
     * @return integer
     */
    public function getMontoInicial()
    {
        return $this->monto_inicial;
    }

    /**
     * Returns the value of field cuotas
     *
     * @return integer
     */
    public function getCuotas()
    {
        return $this->cuotas;
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
     * Returns the value of field saldo
     *
     * @return integer
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Returns the value of field f_compromiso
     *
     * @return string
     */
    public function getFCompromiso()
    {
        return $this->f_compromiso;
    }

    /**
     * Returns the value of field n_cuotas
     *
     * @return integer
     */
    public function getNCuotas()
    {
        return $this->n_cuotas;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_descuent', 'Descuentos', 'id_descuent', array('alias' => 'Descuentos'));
        $this->hasMany('id_deuda', 'MoviDeudas', 'id_deuda', array('alias' => 'MoviDeudas'));
        $this->hasMany('id_descuent', 'Descuentos', 'id_descuent', NULL);
        $this->hasMany('id_deuda', 'MoviDeudas', 'id_deuda', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_deudas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbDeudas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbDeudas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
