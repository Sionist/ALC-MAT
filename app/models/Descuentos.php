<?php

class Descuentos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_descuent;

    /**
     *
     * @var string
     */
    protected $descuento;

    /**
     *
     * @var integer
     */
    protected $rif;

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
     * Method to set the value of field descuento
     *
     * @param string $descuento
     * @return $this
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Method to set the value of field rif
     *
     * @param integer $rif
     * @return $this
     */
    public function setRif($rif)
    {
        $this->rif = $rif;

        return $this;
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
     * Returns the value of field descuento
     *
     * @return string
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Returns the value of field rif
     *
     * @return integer
     */
    public function getRif()
    {
        return $this->rif;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_descuent', 'NbDeudas', 'id_descuent', array('alias' => 'NbDeudas'));
        
		
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'descuentos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Descuentos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Descuentos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
