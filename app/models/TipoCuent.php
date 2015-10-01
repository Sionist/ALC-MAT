<?php

class TipoCuent extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_tipocuent;

    /**
     *
     * @var string
     */
    public $tipo_cuenta;

    /**
     * Method to set the value of field id_tipocuent
     *
     * @param integer $id_tipocuent
     * @return $this
     */
    public function setIdTipocuent($id_tipocuent)
    {
        $this->id_tipocuent = $id_tipocuent;

        return $this;
    }

    /**
     * Method to set the value of field tipo_cuenta
     *
     * @param string $tipo_cuenta
     * @return $this
     */
    public function setTipoCuenta($tipo_cuenta)
    {
        $this->tipo_cuenta = $tipo_cuenta;

        return $this;
    }

    /**
     * Returns the value of field id_tipocuent
     *
     * @return integer
     */
    public function getIdTipocuent()
    {
        return $this->id_tipocuent;
    }

    /**
     * Returns the value of field tipo_cuenta
     *
     * @return string
     */
    public function getTipoCuenta()
    {
        return $this->tipo_cuenta;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_tipocuent', 'Datosfinancieros', 'tipo_cuenta', array('alias' => 'Datosfinancieros'));
        $this->hasMany('id_tipocuent', 'Datosfinancieros', 'tipo_cuenta', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_cuent';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoCuent[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoCuent
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
