<?php

class Estados extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_estado;

    /**
     *
     * @var string
     */
    protected $estado;

    /**
     * Method to set the value of field id_estado
     *
     * @param integer $id_estado
     * @return $this
     */
    public function setIdEstado($id_estado)
    {
        $this->id_estado = $id_estado;

        return $this;
    }

    /**
     * Method to set the value of field estado
     *
     * @param string $estado
     * @return $this
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Returns the value of field id_estado
     *
     * @return integer
     */
    public function getIdEstado()
    {
        return $this->id_estado;
    }

    /**
     * Returns the value of field estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_estado', 'Ciudades', 'id_estado', array('alias' => 'Ciudades'));
        $this->hasMany('id_estado', 'Ciudades', 'id_estado', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'estados';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Estados[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Estados
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
