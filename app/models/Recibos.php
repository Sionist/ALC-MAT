<?php

class Recibos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_recibo;

    /**
     *
     * @var integer
     */
    protected $id_embargo;

    /**
     *
     * @var integer
     */
    protected $monto_general;

    /**
     *
     * @var string
     */
    protected $f_recibo;

    /**
     * Method to set the value of field id_recibo
     *
     * @param integer $id_recibo
     * @return $this
     */
    public function setIdRecibo($id_recibo)
    {
        $this->id_recibo = $id_recibo;

        return $this;
    }

    /**
     * Method to set the value of field id_embargo
     *
     * @param integer $id_embargo
     * @return $this
     */
    public function setIdEmbargo($id_embargo)
    {
        $this->id_embargo = $id_embargo;

        return $this;
    }

    /**
     * Method to set the value of field monto_general
     *
     * @param integer $monto_general
     * @return $this
     */
    public function setMontoGeneral($monto_general)
    {
        $this->monto_general = $monto_general;

        return $this;
    }

    /**
     * Method to set the value of field f_recibo
     *
     * @param string $f_recibo
     * @return $this
     */
    public function setFRecibo($f_recibo)
    {
        $this->f_recibo = $f_recibo;

        return $this;
    }

    /**
     * Returns the value of field id_recibo
     *
     * @return integer
     */
    public function getIdRecibo()
    {
        return $this->id_recibo;
    }

    /**
     * Returns the value of field id_embargo
     *
     * @return integer
     */
    public function getIdEmbargo()
    {
        return $this->id_embargo;
    }

    /**
     * Returns the value of field monto_general
     *
     * @return integer
     */
    public function getMontoGeneral()
    {
        return $this->monto_general;
    }

    /**
     * Returns the value of field f_recibo
     *
     * @return string
     */
    public function getFRecibo()
    {
        return $this->f_recibo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_recibo', 'Recibos2', 'id_recibo', array('alias' => 'Recibos2'));
        $this->belongsTo('id_embargo', 'NbEmbargos', 'id_embargo', array('alias' => 'NbEmbargos'));
        $this->hasMany('id_recibo', 'Recibos2', 'id_recibo', NULL);
        $this->belongsTo('id_embargo', 'Nbembargos', 'id_embargo', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'recibos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recibos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recibos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
