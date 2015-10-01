<?php

class Cargaestudiantes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_carga_e;

    /**
     *
     * @var integer
     */
    protected $ci_carga;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $id_niveldinst;

    /**
     * Method to set the value of field id_carga_e
     *
     * @param integer $id_carga_e
     * @return $this
     */
    public function setIdCargaE($id_carga_e)
    {
        $this->id_carga_e = $id_carga_e;

        return $this;
    }

    /**
     * Method to set the value of field ci_carga
     *
     * @param integer $ci_carga
     * @return $this
     */
    public function setCiCarga($ci_carga)
    {
        $this->ci_carga = $ci_carga;

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
     * Method to set the value of field id_niveldinst
     *
     * @param integer $id_niveldinst
     * @return $this
     */
    public function setIdNiveldinst($id_niveldinst)
    {
        $this->id_niveldinst = $id_niveldinst;

        return $this;
    }

    /**
     * Returns the value of field id_carga_e
     *
     * @return integer
     */
    public function getIdCargaE()
    {
        return $this->id_carga_e;
    }

    /**
     * Returns the value of field ci_carga
     *
     * @return integer
     */
    public function getCiCarga()
    {
        return $this->ci_carga;
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
     * Returns the value of field id_niveldinst
     *
     * @return integer
     */
    public function getIdNiveldinst()
    {
        return $this->id_niveldinst;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_niveldinst', 'NivelInstruc', 'id_niveldinst', array('alias' => 'NivelInstruc'));
        $this->belongsTo('id_niveldinst', 'Nivelinstruc', 'id_niveldinst', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cargaestudiantes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargaestudiantes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargaestudiantes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
