<?php

class CargaDiscapacidad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_cargadisca;

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
    protected $id_discapacid;

    /**
     * Method to set the value of field id_cargadisca
     *
     * @param integer $id_cargadisca
     * @return $this
     */
    public function setIdCargadisca($id_cargadisca)
    {
        $this->id_cargadisca = $id_cargadisca;

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
     * Method to set the value of field id_discapacid
     *
     * @param integer $id_discapacid
     * @return $this
     */
    public function setIdDiscapacid($id_discapacid)
    {
        $this->id_discapacid = $id_discapacid;

        return $this;
    }

    /**
     * Returns the value of field id_cargadisca
     *
     * @return integer
     */
    public function getIdCargadisca()
    {
        return $this->id_cargadisca;
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
     * Returns the value of field id_discapacid
     *
     * @return integer
     */
    public function getIdDiscapacid()
    {
        return $this->id_discapacid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_discapacid', 'Discapacidad', 'id_discapacid', array('alias' => 'Discapacidad'));
        $this->belongsTo('id_discapacid', 'Discapacidad', 'id_discapacid', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'carga_discapacidad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CargaDiscapacidad[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CargaDiscapacidad
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
