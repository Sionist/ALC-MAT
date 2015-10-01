<?php

class NbReposo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_reposo;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

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
     * @var string
     */
    protected $diagnostico;

    /**
     * Method to set the value of field id_reposo
     *
     * @param integer $id_reposo
     * @return $this
     */
    public function setIdReposo($id_reposo)
    {
        $this->id_reposo = $id_reposo;

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
     * Method to set the value of field diagnostico
     *
     * @param string $diagnostico
     * @return $this
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    /**
     * Returns the value of field id_reposo
     *
     * @return integer
     */
    public function getIdReposo()
    {
        return $this->id_reposo;
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
     * Returns the value of field diagnostico
     *
     * @return string
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_reposo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbReposo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbReposo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
