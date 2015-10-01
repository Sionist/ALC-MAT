<?php

class NbViaticos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_viaticos;

    /**
     *
     * @var string
     */
    protected $f_emi;

    /**
     *
     * @var string
     */
    protected $f_pago;

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
     * Method to set the value of field id_viaticos
     *
     * @param integer $id_viaticos
     * @return $this
     */
    public function setIdViaticos($id_viaticos)
    {
        $this->id_viaticos = $id_viaticos;

        return $this;
    }

    /**
     * Method to set the value of field f_emi
     *
     * @param string $f_emi
     * @return $this
     */
    public function setFEmi($f_emi)
    {
        $this->f_emi = $f_emi;

        return $this;
    }

    /**
     * Method to set the value of field f_pago
     *
     * @param string $f_pago
     * @return $this
     */
    public function setFPago($f_pago)
    {
        $this->f_pago = $f_pago;

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
     * Returns the value of field id_viaticos
     *
     * @return integer
     */
    public function getIdViaticos()
    {
        return $this->id_viaticos;
    }

    /**
     * Returns the value of field f_emi
     *
     * @return string
     */
    public function getFEmi()
    {
        return $this->f_emi;
    }

    /**
     * Returns the value of field f_pago
     *
     * @return string
     */
    public function getFPago()
    {
        return $this->f_pago;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_viaticos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbViaticos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbViaticos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
