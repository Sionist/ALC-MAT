<?php

class Fideicomiso extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_fideicomiso;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $mes;

    /**
     *
     * @var integer
     */
    protected $anofide;

    /**
     *
     * @var integer
     */
    protected $id_diaspres;

    /**
     *
     * @var integer
     */
    protected $s_promdiario;

    /**
     *
     * @var integer
     */
    protected $prestmensual;

    /**
     *
     * @var integer
     */
    protected $prestaacum;

    /**
     *
     * @var integer
     */
    protected $id_adelanto;

    /**
     *
     * @var integer
     */
    protected $total_prest;

    /**
     *
     * @var integer
     */
    protected $id_tasa;

    /**
     *
     * @var integer
     */
    protected $intereses_mes;

    /**
     *
     * @var integer
     */
    protected $fide_mes;

    /**
     * Method to set the value of field id_fideicomiso
     *
     * @param integer $id_fideicomiso
     * @return $this
     */
    public function setIdFideicomiso($id_fideicomiso)
    {
        $this->id_fideicomiso = $id_fideicomiso;

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
     * Method to set the value of field anofide
     *
     * @param integer $anofide
     * @return $this
     */
    public function setAnofide($anofide)
    {
        $this->anofide = $anofide;

        return $this;
    }

    /**
     * Method to set the value of field id_diaspres
     *
     * @param integer $id_diaspres
     * @return $this
     */
    public function setIdDiaspres($id_diaspres)
    {
        $this->id_diaspres = $id_diaspres;

        return $this;
    }

    /**
     * Method to set the value of field s_promdiario
     *
     * @param integer $s_promdiario
     * @return $this
     */
    public function setSPromdiario($s_promdiario)
    {
        $this->s_promdiario = $s_promdiario;

        return $this;
    }

    /**
     * Method to set the value of field prestmensual
     *
     * @param integer $prestmensual
     * @return $this
     */
    public function setPrestmensual($prestmensual)
    {
        $this->prestmensual = $prestmensual;

        return $this;
    }

    /**
     * Method to set the value of field prestaacum
     *
     * @param integer $prestaacum
     * @return $this
     */
    public function setPrestaacum($prestaacum)
    {
        $this->prestaacum = $prestaacum;

        return $this;
    }

    /**
     * Method to set the value of field id_adelanto
     *
     * @param integer $id_adelanto
     * @return $this
     */
    public function setIdAdelanto($id_adelanto)
    {
        $this->id_adelanto = $id_adelanto;

        return $this;
    }

    /**
     * Method to set the value of field total_prest
     *
     * @param integer $total_prest
     * @return $this
     */
    public function setTotalPrest($total_prest)
    {
        $this->total_prest = $total_prest;

        return $this;
    }

    /**
     * Method to set the value of field id_tasa
     *
     * @param integer $id_tasa
     * @return $this
     */
    public function setIdTasa($id_tasa)
    {
        $this->id_tasa = $id_tasa;

        return $this;
    }

    /**
     * Method to set the value of field intereses_mes
     *
     * @param integer $intereses_mes
     * @return $this
     */
    public function setInteresesMes($intereses_mes)
    {
        $this->intereses_mes = $intereses_mes;

        return $this;
    }

    /**
     * Method to set the value of field fide_mes
     *
     * @param integer $fide_mes
     * @return $this
     */
    public function setFideMes($fide_mes)
    {
        $this->fide_mes = $fide_mes;

        return $this;
    }

    /**
     * Returns the value of field id_fideicomiso
     *
     * @return integer
     */
    public function getIdFideicomiso()
    {
        return $this->id_fideicomiso;
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
     * Returns the value of field mes
     *
     * @return integer
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Returns the value of field anofide
     *
     * @return integer
     */
    public function getAnofide()
    {
        return $this->anofide;
    }

    /**
     * Returns the value of field id_diaspres
     *
     * @return integer
     */
    public function getIdDiaspres()
    {
        return $this->id_diaspres;
    }

    /**
     * Returns the value of field s_promdiario
     *
     * @return integer
     */
    public function getSPromdiario()
    {
        return $this->s_promdiario;
    }

    /**
     * Returns the value of field prestmensual
     *
     * @return integer
     */
    public function getPrestmensual()
    {
        return $this->prestmensual;
    }

    /**
     * Returns the value of field prestaacum
     *
     * @return integer
     */
    public function getPrestaacum()
    {
        return $this->prestaacum;
    }

    /**
     * Returns the value of field id_adelanto
     *
     * @return integer
     */
    public function getIdAdelanto()
    {
        return $this->id_adelanto;
    }

    /**
     * Returns the value of field total_prest
     *
     * @return integer
     */
    public function getTotalPrest()
    {
        return $this->total_prest;
    }

    /**
     * Returns the value of field id_tasa
     *
     * @return integer
     */
    public function getIdTasa()
    {
        return $this->id_tasa;
    }

    /**
     * Returns the value of field intereses_mes
     *
     * @return integer
     */
    public function getInteresesMes()
    {
        return $this->intereses_mes;
    }

    /**
     * Returns the value of field fide_mes
     *
     * @return integer
     */
    public function getFideMes()
    {
        return $this->fide_mes;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_adelanto', 'Adelantos', 'id_adelanto', array('alias' => 'Adelantos'));
        $this->hasMany('id_diaspres', 'DiasPrestaciones', 'id_diaspres', array('alias' => 'DiasPrestaciones'));
        $this->hasMany('id_tasa', 'TasasBcv', 'id_tasa', array('alias' => 'TasasBcv'));
        $this->hasMany('id_adelanto', 'Adelantos', 'id_adelanto', NULL);
        $this->hasMany('id_diaspres', 'DiasPrestaciones', 'id_diaspres', NULL);
        $this->hasMany('id_tasa', 'TasasBcv', 'id_tasa', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'fideicomiso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fideicomiso[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fideicomiso
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
