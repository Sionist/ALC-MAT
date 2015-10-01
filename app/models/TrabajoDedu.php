<?php

class TrabajoDedu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $id_trabajo_dedu;

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
     * Method to set the value of field id_trabajo_dedu
     *
     * @param integer $id_trabajo_dedu
     * @return $this
     */
    public function setIdTrabajoDedu($id_trabajo_dedu)
    {
        $this->id_trabajo_dedu = $id_trabajo_dedu;

        return $this;
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
     * Returns the value of field id_trabajo_dedu
     *
     * @return integer
     */
    public function getIdTrabajoDedu()
    {
        return $this->id_trabajo_dedu;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'trabajo_dedu';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TrabajoDedu[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TrabajoDedu
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
