<?php

class Recibos2 extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_recibo2;

    /**
     *
     * @var integer
     */
    protected $semana_quin;

    /**
     *
     * @var integer
     */
    protected $monto_semquin;

    /**
     *
     * @var integer
     */
    protected $id_recibo;

    /**
     * Method to set the value of field id_recibo2
     *
     * @param integer $id_recibo2
     * @return $this
     */
    public function setIdRecibo2($id_recibo2)
    {
        $this->id_recibo2 = $id_recibo2;

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
     * Method to set the value of field monto_semquin
     *
     * @param integer $monto_semquin
     * @return $this
     */
    public function setMontoSemquin($monto_semquin)
    {
        $this->monto_semquin = $monto_semquin;

        return $this;
    }

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
     * Returns the value of field id_recibo2
     *
     * @return integer
     */
    public function getIdRecibo2()
    {
        return $this->id_recibo2;
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
     * Returns the value of field monto_semquin
     *
     * @return integer
     */
    public function getMontoSemquin()
    {
        return $this->monto_semquin;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_recibo', 'Recibos', 'id_recibo', array('alias' => 'Recibos'));
        $this->belongsTo('id_recibo', 'Recibos', 'id_recibo', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'recibos2';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recibos2[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recibos2
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
