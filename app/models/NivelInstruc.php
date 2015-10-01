<?php

class NivelInstruc extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_niveldinst;

    /**
     *
     * @var string
     */
    public $nivel_instruc;

    /**
     * Method to set the value of field id_niveldinst
     *
     * @param integer $id_niveldinst
     * @return $this
     */
    public function setIdNiveldinst($id_niveldinst)
    {
        $this->id_niveldinst = $id_niveldinst;

        return $this;
    }

    /**
     * Method to set the value of field nivel_instruc
     *
     * @param string $nivel_instruc
     * @return $this
     */
    public function setNivelInstruc($nivel_instruc)
    {
        $this->nivel_instruc = $nivel_instruc;

        return $this;
    }

    /**
     * Returns the value of field id_niveldinst
     *
     * @return integer
     */
    public function getIdNiveldinst()
    {
        return $this->id_niveldinst;
    }

    /**
     * Returns the value of field nivel_instruc
     *
     * @return string
     */
    public function getNivelInstruc()
    {
        return $this->nivel_instruc;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_niveldinst', 'Cargaestudiantes', 'id_niveldinst', array('alias' => 'Cargaestudiantes'));
        $this->hasMany('id_niveldinst', 'Datosprofesiona', 'nive_instr', array('alias' => 'Datosprofesiona'));
        $this->hasMany('id_niveldinst', 'Cargaestudiantes', 'id_niveldinst', NULL);
        $this->hasMany('id_niveldinst', 'Datosprofesiona', 'nive_instr', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nivel_instruc';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NivelInstruc[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NivelInstruc
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
