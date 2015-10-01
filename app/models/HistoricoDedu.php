<?php

class HistoricoDedu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_historicodedu;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $id_regnomina;

    /**
     *
     * @var integer
     */
    protected $mes;

    /**
     *
     * @var integer
     */
    protected $ano;

    /**
     *
     * @var integer
     */
    protected $monto_dedu;

    /**
     *
     * @var integer
     */
    protected $id_deduccion;

    /**
     * Method to set the value of field id_historicodedu
     *
     * @param integer $id_historicodedu
     * @return $this
     */
    public function setIdHistoricodedu($id_historicodedu)
    {
        $this->id_historicodedu = $id_historicodedu;

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
     * Method to set the value of field id_regnomina
     *
     * @param integer $id_regnomina
     * @return $this
     */
    public function setIdRegnomina($id_regnomina)
    {
        $this->id_regnomina = $id_regnomina;

        return $this;
    }

    /**
     * Method to set the value of field mes
     *
     * @param integer $mes
     * @return $this
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Method to set the value of field ano
     *
     * @param integer $ano
     * @return $this
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Method to set the value of field monto_dedu
     *
     * @param integer $monto_dedu
     * @return $this
     */
    public function setMontoDedu($monto_dedu)
    {
        $this->monto_dedu = $monto_dedu;

        return $this;
    }

    /**
     * Method to set the value of field id_deduccion
     *
     * @param integer $id_deduccion
     * @return $this
     */
    public function setIdDeduccion($id_deduccion)
    {
        $this->id_deduccion = $id_deduccion;

        return $this;
    }

    /**
     * Returns the value of field id_historicodedu
     *
     * @return integer
     */
    public function getIdHistoricodedu()
    {
        return $this->id_historicodedu;
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
     * Returns the value of field id_regnomina
     *
     * @return integer
     */
    public function getIdRegnomina()
    {
        return $this->id_regnomina;
    }

    /**
     * Returns the value of field mes
     *
     * @return integer
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Returns the value of field ano
     *
     * @return integer
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Returns the value of field monto_dedu
     *
     * @return integer
     */
    public function getMontoDedu()
    {
        return $this->monto_dedu;
    }

    /**
     * Returns the value of field id_deduccion
     *
     * @return integer
     */
    public function getIdDeduccion()
    {
        return $this->id_deduccion;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'historico_dedu';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoricoDedu[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoricoDedu
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
