<?php

class EstatusT extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_estat;

    /**
     *
     * @var string
     */
    protected $estatus;

    /**
     * Method to set the value of field id_estat
     *
     * @param integer $id_estat
     * @return $this
     */
    public function setIdEstat($id_estat)
    {
        $this->id_estat = $id_estat;

        return $this;
    }

    /**
     * Method to set the value of field estatus
     *
     * @param string $estatus
     * @return $this
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Returns the value of field id_estat
     *
     * @return integer
     */
    public function getIdEstat()
    {
        return $this->id_estat;
    }

    /**
     * Returns the value of field estatus
     *
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_estat', 'Datospersonales', 'estatus', array('alias' => 'Datospersonales'));
        $this->hasMany('id_estat', 'Datospersonales', 'estatus', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'estatus_t';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EstatusT[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EstatusT
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
