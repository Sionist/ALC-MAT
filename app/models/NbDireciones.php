<?php

class NbDireciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_direcciones;

    /**
     *
     * @var string
     */
    public $sec_pro_act;

    /**
     *
     * @var string
     */
    public $denominacion;

    /**
     * Method to set the value of field id_direcciones
     *
     * @param integer $id_direcciones
     * @return $this
     */
    public function setIdDirecciones($id_direcciones)
    {
        $this->id_direcciones = $id_direcciones;

        return $this;
    }

    /**
     * Method to set the value of field sec_pro_act
     *
     * @param string $sec_pro_act
     * @return $this
     */
    public function setSecProAct($sec_pro_act)
    {
        $this->sec_pro_act = $sec_pro_act;

        return $this;
    }

    /**
     * Method to set the value of field denominacion
     *
     * @param string $denominacion
     * @return $this
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Returns the value of field id_direcciones
     *
     * @return integer
     */
    public function getIdDirecciones()
    {
        return $this->id_direcciones;
    }

    /**
     * Returns the value of field sec_pro_act
     *
     * @return string
     */
    public function getSecProAct()
    {
        return $this->sec_pro_act;
    }

    /**
     * Returns the value of field denominacion
     *
     * @return string
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_direcciones', 'Datoscontratacion', 'ubi_nom', array('alias' => 'Datoscontratacion'));
        $this->hasMany('id_direcciones', 'Datoscontratacion', 'ubi_fun', array('alias' => 'Datoscontratacion'));
        $this->hasMany('id_direcciones', 'DireccionCargo', 'id_direcciones', array('alias' => 'DireccionCargo'));
        $this->hasMany('id_direcciones', 'Datoscontratacion', 'ubi_nom', NULL);
        $this->hasMany('id_direcciones', 'Datoscontratacion', 'ubi_fun', NULL);
        $this->hasMany('id_direcciones', 'DireccionCargo', 'id_direcciones', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_direciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbDireciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbDireciones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
