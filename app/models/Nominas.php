<?php

class Nominas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $sqm;

    /**
     *
     * @var integer
     */
    protected $tipo_nomi;

    /**
     *
     * @var string
     */
    protected $fecha;

    /**
     *
     * @var string
     */
    protected $f_inicio;

    /**
     *
     * @var string
     */
    protected $f_final;

    /**
     *
     * @var integer
     */
    protected $estatus;

    /**
     *
     * @var string
     */
    protected $deducs;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field sqm
     *
     * @param integer $sqm
     * @return $this
     */
    public function setSqm($sqm)
    {
        $this->sqm = $sqm;

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
     * Method to set the value of field f_inicio
     *
     * @param string $f_inicio
     * @return $this
     */
    public function setFInicio($f_inicio)
    {
        $this->f_inicio = $f_inicio;

        return $this;
    }

    /**
     * Method to set the value of field f_final
     *
     * @param string $f_final
     * @return $this
     */
    public function setFFinal($f_final)
    {
        $this->f_final = $f_final;

        return $this;
    }

    /**
     * Method to set the value of field estatus
     *
     * @param integer $estatus
     * @return $this
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Method to set the value of field deducs
     *
     * @param string $deducs
     * @return $this
     */
    public function setDeducs($deducs)
    {
        $this->deducs = $deducs;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field sqm
     *
     * @return integer
     */
    public function getSqm()
    {
        return $this->sqm;
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
     * Returns the value of field fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Returns the value of field f_inicio
     *
     * @return string
     */
    public function getFInicio()
    {
        return $this->f_inicio;
    }

    /**
     * Returns the value of field f_final
     *
     * @return string
     */
    public function getFFinal()
    {
        return $this->f_final;
    }

    /**
     * Returns the value of field estatus
     *
     * @return integer
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Returns the value of field deducs
     *
     * @return string
     */
    public function getDeducs()
    {
        return $this->deducs;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('estatus', 'EstatusNom', 'id', array('alias' => 'EstatusNom'));
        $this->belongsTo('tipo_nomi', 'TipoNomi', 'id_nomina', array('alias' => 'TipoNomi'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nominas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nominas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nominas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
