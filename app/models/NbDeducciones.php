<?php

class NbDeducciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_deduccion;

    /**
     *
     * @var string
     */
    protected $nb_deduccion;

    /**
     *
     * @var string
     */
    protected $formula;

    /**
     *
     * @var integer
     */
    protected $id_frecuencia;

    /**
     *
     * @var integer
     */
    protected $tipo_nomi;

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
     * Method to set the value of field nb_deduccion
     *
     * @param string $nb_deduccion
     * @return $this
     */
    public function setNbDeduccion($nb_deduccion)
    {
        $this->nb_deduccion = $nb_deduccion;

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
     * Method to set the value of field id_frecuencia
     *
     * @param integer $id_frecuencia
     * @return $this
     */
    public function setIdFrecuencia($id_frecuencia)
    {
        $this->id_frecuencia = $id_frecuencia;

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
     * Returns the value of field id_deduccion
     *
     * @return integer
     */
    public function getIdDeduccion()
    {
        return $this->id_deduccion;
    }

    /**
     * Returns the value of field nb_deduccion
     *
     * @return string
     */
    public function getNbDeduccion()
    {
        return $this->nb_deduccion;
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
     * Returns the value of field id_frecuencia
     *
     * @return integer
     */
    public function getIdFrecuencia()
    {
        return $this->id_frecuencia;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_frecuencia', 'Frecuencia', 'id_frecuencia', array('alias' => 'Frecuencia'));
        $this->belongsTo('id_frecuencia', 'Frecuencia', 'id_frecuencia', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_deducciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbDeducciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbDeducciones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
