<?php

class FondoDesc extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_fondo;

    /**
     *
     * @var string
     */
    protected $fondo;

    /**
     * Method to set the value of field id_fondo
     *
     * @param integer $id_fondo
     * @return $this
     */
    public function setIdFondo($id_fondo)
    {
        $this->id_fondo = $id_fondo;

        return $this;
    }

    /**
     * Method to set the value of field fondo
     *
     * @param string $fondo
     * @return $this
     */
    public function setFondo($fondo)
    {
        $this->fondo = $fondo;

        return $this;
    }

    /**
     * Returns the value of field id_fondo
     *
     * @return integer
     */
    public function getIdFondo()
    {
        return $this->id_fondo;
    }

    /**
     * Returns the value of field fondo
     *
     * @return string
     */
    public function getFondo()
    {
        return $this->fondo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_fondo', 'NbEmbargos', 'id_fondo', array('alias' => 'NbEmbargos'));
        
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'fondo_desc';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FondoDesc[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FondoDesc
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
