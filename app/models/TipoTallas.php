<?php

class TipoTallas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_tipotalla;

    /**
     *
     * @var string
     */
    protected $concepto;

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
     * Method to set the value of field concepto
     *
     * @param string $concepto
     * @return $this
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
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
     * Returns the value of field concepto
     *
     * @return string
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_tipotalla', 'Tallas', 'id_tipotalla', array('alias' => 'Tallas'));
        $this->hasMany('id_tipotalla', 'Tallas', 'id_tipotalla', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_tallas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoTallas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoTallas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
