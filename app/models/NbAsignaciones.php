<?php

class NbAsignaciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_asignac;

    /**
     *
     * @var string
     */
    protected $asignacion;

    /**
     *
     * @var string
     */
    protected $formula;

    /**
     *
     * @var integer
     */
    protected $tipo_nomi;

    /**
     *
     * @var integer
     */
    protected $frecuencia;

    /**
     *
     * @var string
     */
    protected $parti_presuspuest;

    /**
     *
     * @var string
     */
    protected $denominacion;

    /**
     *
     * @var integer
     */
    protected $tipo;

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
     * Method to set the value of field asignacion
     *
     * @param string $asignacion
     * @return $this
     */
    public function setAsignacion($asignacion)
    {
        $this->asignacion = $asignacion;

        return $this;
    }

    /**
     * Method to set the value of field formula
     *
     * @param string $formula
     * @return $this
     */
    public function setFormula($formula)
    {
        $this->formula = $formula;

        return $this;
    }

    /**
     * Method to set the value of field tipo_nomi
     *
     * @param integer $tipo_nomi
     * @return $this
     */
    public function setTipoNomi($tipo_nomi)
    {
        $this->tipo_nomi = $tipo_nomi;

        return $this;
    }

    /**
     * Method to set the value of field frecuencia
     *
     * @param integer $frecuencia
     * @return $this
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Method to set the value of field parti_presuspuest
     *
     * @param string $parti_presuspuest
     * @return $this
     */
    public function setPartiPresuspuest($parti_presuspuest)
    {
        $this->parti_presuspuest = $parti_presuspuest;

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
     * Method to set the value of field tipo
     *
     * @param integer $tipo
     * @return $this
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
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
     * Returns the value of field asignacion
     *
     * @return string
     */
    public function getAsignacion()
    {
        return $this->asignacion;
    }

    /**
     * Returns the value of field formula
     *
     * @return string
     */
    public function getFormula()
    {
        return $this->formula;
    }

    /**
     * Returns the value of field tipo_nomi
     *
     * @return integer
     */
    public function getTipoNomi()
    {
        return $this->tipo_nomi;
    }

    /**
     * Returns the value of field frecuencia
     *
     * @return integer
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Returns the value of field parti_presuspuest
     *
     * @return string
     */
    public function getPartiPresuspuest()
    {
        return $this->parti_presuspuest;
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
     * Returns the value of field tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_asignac', 'TrabajoAsi', 'id_trabajo_asi', array('alias' => 'TrabajoAsi'));
        $this->hasMany('id_asignac', 'Variaciones', 'id_asignac', array('alias' => 'Variaciones'));
        $this->belongsTo('tipo_nomi', 'TipoNomi', 'id_nomina', array('alias' => 'TipoNomi'));
        $this->belongsTo('frecuencia', 'Frecuencia', 'id_frecuencia', array('alias' => 'Frecuencia'));
        $this->belongsTo('tipo', 'AsigsTipo', 'id_tipo', array('alias' => 'AsigsTipo'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_asignaciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbAsignaciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbAsignaciones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
