<?php

class HistoricoAsi extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_historicoasi;

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
    protected $monto_asignar;

    /**
     *
     * @var integer
     */
    protected $id_asignacion;

    /**
     * Method to set the value of field id_historicoasi
     *
     * @param integer $id_historicoasi
     * @return $this
     */
    public function setIdHistoricoasi($id_historicoasi)
    {
        $this->id_historicoasi = $id_historicoasi;

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
     * Method to set the value of field monto_asignar
     *
     * @param integer $monto_asignar
     * @return $this
     */
    public function setMontoAsignar($monto_asignar)
    {
        $this->monto_asignar = $monto_asignar;

        return $this;
    }

    /**
     * Method to set the value of field id_asignacion
     *
     * @param integer $id_asignacion
     * @return $this
     */
    public function setIdAsignacion($id_asignacion)
    {
        $this->id_asignacion = $id_asignacion;

        return $this;
    }

    /**
     * Returns the value of field id_historicoasi
     *
     * @return integer
     */
    public function getIdHistoricoasi()
    {
        return $this->id_historicoasi;
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
     * Returns the value of field monto_asignar
     *
     * @return integer
     */
    public function getMontoAsignar()
    {
        return $this->monto_asignar;
    }

    /**
     * Returns the value of field id_asignacion
     *
     * @return integer
     */
    public function getIdAsignacion()
    {
        return $this->id_asignacion;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'historico_asi';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoricoAsi[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoricoAsi
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
