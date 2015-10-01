<?php

class TipoContrat extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_contrato;

    /**
     *
     * @var string
     */
    public $contrato;

    /**
     * Method to set the value of field id_contrato
     *
     * @param integer $id_contrato
     * @return $this
     */
    public function setIdContrato($id_contrato)
    {
        $this->id_contrato = $id_contrato;

        return $this;
    }

    /**
     * Method to set the value of field contrato
     *
     * @param string $contrato
     * @return $this
     */
    public function setContrato($contrato)
    {
        $this->contrato = $contrato;

        return $this;
    }

    /**
     * Returns the value of field id_contrato
     *
     * @return integer
     */
    public function getIdContrato()
    {
        return $this->id_contrato;
    }

    /**
     * Returns the value of field contrato
     *
     * @return string
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_contrato', 'Datoscontratacion', 'tipo_cont', array('alias' => 'Datoscontratacion'));
        $this->hasMany('id_contrato', 'Datoscontratacion', 'tipo_cont', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_contrat';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoContrat[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoContrat
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
