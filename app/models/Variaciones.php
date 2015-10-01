<?php

class Variaciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_variacion;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $id_asignac;

    /**
     *
     * @var integer
     */
    protected $monto;

    /**
     * Method to set the value of field id_variacion
     *
     * @param integer $id_variacion
     * @return $this
     */
    public function setIdVariacion($id_variacion)
    {
        $this->id_variacion = $id_variacion;

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
     * Method to set the value of field id_asignac
     *
     * @param integer $id_asignac
     * @return $this
     */
    public function setIdAsignac($id_asignac)
    {
        $this->id_asignac = $id_asignac;

        return $this;
    }

    /**
     * Method to set the value of field monto
     *
     * @param integer $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Returns the value of field id_variacion
     *
     * @return integer
     */
    public function getIdVariacion()
    {
        return $this->id_variacion;
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
     * Returns the value of field id_asignac
     *
     * @return integer
     */
    public function getIdAsignac()
    {
        return $this->id_asignac;
    }

    /**
     * Returns the value of field monto
     *
     * @return integer
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_asignac', 'NbAsignaciones', 'id_asignac', array('alias' => 'NbAsignaciones'));
        $this->belongsTo('id_asignac', 'Nbasignaciones', 'id_asignac', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'variaciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Variaciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Variaciones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
