<?php

class MoviDeudas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_movideuda;

    /**
     *
     * @var integer
     */
    protected $id_deuda;

    /**
     *
     * @var string
     */
    protected $f_pago;

    /**
     *
     * @var integer
     */
    protected $monto_cuota;

    /**
     *
     * @var integer
     */
    protected $correlativo_cuot;

    /**
     *
     * @var integer
     */
    protected $semana_quin;

    /**
     * Method to set the value of field id_movideuda
     *
     * @param integer $id_movideuda
     * @return $this
     */
    public function setIdMovideuda($id_movideuda)
    {
        $this->id_movideuda = $id_movideuda;

        return $this;
    }

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
     * Method to set the value of field monto_cuota
     *
     * @param integer $monto_cuota
     * @return $this
     */
    public function setMontoCuota($monto_cuota)
    {
        $this->monto_cuota = $monto_cuota;

        return $this;
    }

    /**
     * Method to set the value of field correlativo_cuot
     *
     * @param integer $correlativo_cuot
     * @return $this
     */
    public function setCorrelativoCuot($correlativo_cuot)
    {
        $this->correlativo_cuot = $correlativo_cuot;

        return $this;
    }

    /**
     * Method to set the value of field semana_quin
     *
     * @param integer $semana_quin
     * @return $this
     */
    public function setSemanaQuin($semana_quin)
    {
        $this->semana_quin = $semana_quin;

        return $this;
    }

    /**
     * Returns the value of field id_movideuda
     *
     * @return integer
     */
    public function getIdMovideuda()
    {
        return $this->id_movideuda;
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
     * Returns the value of field f_pago
     *
     * @return string
     */
    public function getFPago()
    {
        return $this->f_pago;
    }

    /**
     * Returns the value of field monto_cuota
     *
     * @return integer
     */
    public function getMontoCuota()
    {
        return $this->monto_cuota;
    }

    /**
     * Returns the value of field correlativo_cuot
     *
     * @return integer
     */
    public function getCorrelativoCuot()
    {
        return $this->correlativo_cuot;
    }

    /**
     * Returns the value of field semana_quin
     *
     * @return integer
     */
    public function getSemanaQuin()
    {
        return $this->semana_quin;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_deuda', 'NbDeudas', 'id_deuda', array('alias' => 'NbDeudas'));
        $this->belongsTo('id_deuda', 'Nbdeudas', 'id_deuda', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'movi_deudas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoviDeudas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoviDeudas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
