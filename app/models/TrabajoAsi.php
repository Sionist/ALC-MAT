<?php

class TrabajoAsi extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_trabajo_asi;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     * Method to set the value of field id_trabajo_asi
     *
     * @param integer $id_trabajo_asi
     * @return $this
     */
    public function setIdTrabajoAsi($id_trabajo_asi)
    {
        $this->id_trabajo_asi = $id_trabajo_asi;

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
     * Returns the value of field id_trabajo_asi
     *
     * @return integer
     */
    public function getIdTrabajoAsi()
    {
        return $this->id_trabajo_asi;
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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'trabajo_asi';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TrabajoAsi[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TrabajoAsi
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
