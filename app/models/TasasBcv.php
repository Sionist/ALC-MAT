<?php

class TasasBcv extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_tasa;

    /**
     *
     * @var integer
     */
    protected $tasa;

    /**
     *
     * @var integer
     */
    protected $mes;

    /**
     *
     * @var integer
     */
    protected $ano_tasa;

    /**
     * Method to set the value of field id_tasa
     *
     * @param integer $id_tasa
     * @return $this
     */
    public function setIdTasa($id_tasa)
    {
        $this->id_tasa = $id_tasa;

        return $this;
    }

    /**
     * Method to set the value of field tasa
     *
     * @param integer $tasa
     * @return $this
     */
    public function setTasa($tasa)
    {
        $this->tasa = $tasa;

        return $this;
    }

    /**
     * Method to set the value of field mes
     *
     * @param integer $mes
     * @return $this
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Method to set the value of field ano_tasa
     *
     * @param integer $ano_tasa
     * @return $this
     */
    public function setAnoTasa($ano_tasa)
    {
        $this->ano_tasa = $ano_tasa;

        return $this;
    }

    /**
     * Returns the value of field id_tasa
     *
     * @return integer
     */
    public function getIdTasa()
    {
        return $this->id_tasa;
    }

    /**
     * Returns the value of field tasa
     *
     * @return integer
     */
    public function getTasa()
    {
        return $this->tasa;
    }

    /**
     * Returns the value of field mes
     *
     * @return integer
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Returns the value of field ano_tasa
     *
     * @return integer
     */
    public function getAnoTasa()
    {
        return $this->ano_tasa;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_tasa', 'Fideicomiso', 'id_tasa', array('alias' => 'Fideicomiso'));
        
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tasas_bcv';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TasasBcv[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TasasBcv
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
