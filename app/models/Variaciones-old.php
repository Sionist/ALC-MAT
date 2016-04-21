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
    protected $horas_dias;

    /**
     *
     * @var string
     */
    protected $ano;

    /**
     *
     * @var string
     */
    protected $sqm;

    /**
     *
     * @var integer
     */
    protected $nomina;

    /**
     *
     * @var double
     */
    protected $monto;

    /**
     *
     * @var string
     */
    protected $fecha;

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
     * Method to set the value of field horas_dias
     *
     * @param integer $horas_dias
     * @return $this
     */
    public function setHorasDias($horas_dias)
    {
        $this->horas_dias = $horas_dias;

        return $this;
    }

    /**
     * Method to set the value of field ano
     *
     * @param string $ano
     * @return $this
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Method to set the value of field sqm
     *
     * @param string $sqm
     * @return $this
     */
    public function setSqm($sqm)
    {
        $this->sqm = $sqm;

        return $this;
    }

    /**
     * Method to set the value of field nomina
     *
     * @param integer $nomina
     * @return $this
     */
    public function setNomina($nomina)
    {
        $this->nomina = $nomina;

        return $this;
    }

    /**
     * Method to set the value of field monto
     *
     * @param double $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Method to set the value of field fecha
     *
     * @param string $fecha
     * @return $this
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

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
     * Returns the value of field horas_dias
     *
     * @return integer
     */
    public function getHorasDias()
    {
        return $this->horas_dias;
    }

    /**
     * Returns the value of field ano
     *
     * @return string
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Returns the value of field sqm
     *
     * @return string
     */
    public function getSqm()
    {
        return $this->sqm;
    }

    /**
     * Returns the value of field nomina
     *
     * @return integer
     */
    public function getNomina()
    {
        return $this->nomina;
    }

    /**
     * Returns the value of field monto
     *
     * @return double
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Returns the value of field fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_asignac', 'NbAsignaciones', 'id_asignac', array('alias' => 'NbAsignaciones'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
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
