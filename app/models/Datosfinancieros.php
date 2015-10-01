<?php

class Datosfinancieros extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $nu_cedula;

    /**
     *
     * @var integer
     */
    public $cod_banco;

    /**
     *
     * @var integer
     */
    public $n_cuenta;

    /**
     *
     * @var integer
     */
    public $tipo_cuenta;

    /**
     *
     * @var integer
     */
    public $id_financiero;

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
     * Method to set the value of field cod_banco
     *
     * @param integer $cod_banco
     * @return $this
     */
    public function setCodBanco($cod_banco)
    {
        $this->cod_banco = $cod_banco;

        return $this;
    }

    /**
     * Method to set the value of field n_cuenta
     *
     * @param integer $n_cuenta
     * @return $this
     */
    public function setNCuenta($n_cuenta)
    {
        $this->n_cuenta = $n_cuenta;

        return $this;
    }

    /**
     * Method to set the value of field tipo_cuenta
     *
     * @param integer $tipo_cuenta
     * @return $this
     */
    public function setTipoCuenta($tipo_cuenta)
    {
        $this->tipo_cuenta = $tipo_cuenta;

        return $this;
    }

    /**
     * Method to set the value of field id_financiero
     *
     * @param integer $id_financiero
     * @return $this
     */
    public function setIdFinanciero($id_financiero)
    {
        $this->id_financiero = $id_financiero;

        return $this;
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
     * Returns the value of field cod_banco
     *
     * @return integer
     */
    public function getCodBanco()
    {
        return $this->cod_banco;
    }

    /**
     * Returns the value of field n_cuenta
     *
     * @return integer
     */
    public function getNCuenta()
    {
        return $this->n_cuenta;
    }

    /**
     * Returns the value of field tipo_cuenta
     *
     * @return integer
     */
    public function getTipoCuenta()
    {
        return $this->tipo_cuenta;
    }

    /**
     * Returns the value of field id_financiero
     *
     * @return integer
     */
    public function getIdFinanciero()
    {
        return $this->id_financiero;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->belongsTo('cod_banco', 'NbBancos', 'id_bancos', array('alias' => 'NbBancos'));
        $this->belongsTo('tipo_cuenta', 'TipoCuent', 'id_tipocuent', array('alias' => 'TipoCuent'));

    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datosfinancieros[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datosfinancieros
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'datosfinancieros';
    }

}
