<?php

class Tallas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_talla;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $talla;

    /**
     *
     * @var integer
     */
    protected $id_tipotalla;

    /**
     * Method to set the value of field id_talla
     *
     * @param integer $id_talla
     * @return $this
     */
    public function setIdTalla($id_talla)
    {
        $this->id_talla = $id_talla;

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
     * Method to set the value of field talla
     *
     * @param integer $talla
     * @return $this
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Method to set the value of field id_tipotalla
     *
     * @param integer $id_tipotalla
     * @return $this
     */
    public function setIdTipotalla($id_tipotalla)
    {
        $this->id_tipotalla = $id_tipotalla;

        return $this;
    }

    /**
     * Returns the value of field id_talla
     *
     * @return integer
     */
    public function getIdTalla()
    {
        return $this->id_talla;
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
     * Returns the value of field talla
     *
     * @return integer
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Returns the value of field id_tipotalla
     *
     * @return integer
     */
    public function getIdTipotalla()
    {
        return $this->id_tipotalla;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_tipotalla', 'TipoTallas', 'id_tipotalla', array('alias' => 'TipoTallas'));
        $this->belongsTo('id_tipotalla', 'Tipotallas', 'id_tipotalla', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tallas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tallas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tallas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
