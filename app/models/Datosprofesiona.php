<?php

class Datosprofesiona extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $nu_cedula;

    /**
     *
     * @var integer
     */
    public $nive_instr;

    /**
     *
     * @var integer
     */
    public $id_profesion;

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
     * Method to set the value of field nive_instr
     *
     * @param integer $nive_instr
     * @return $this
     */
    public function setNiveInstr($nive_instr)
    {
        $this->nive_instr = $nive_instr;

        return $this;
    }

    /**
     * Method to set the value of field id_profesion
     *
     * @param integer $id_profesion
     * @return $this
     */
    public function setIdProfesion($id_profesion)
    {
        $this->id_profesion = $id_profesion;

        return $this;
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
     * Returns the value of field nive_instr
     *
     * @return integer
     */
    public function getNiveInstr()
    {
        return $this->nive_instr;
    }

    /**
     * Returns the value of field id_profesion
     *
     * @return integer
     */
    public function getIdProfesion()
    {
        return $this->id_profesion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nive_instr', 'NivelInstruc', 'id_niveldinst', array('alias' => 'NivelInstruc'));
        $this->belongsTo('id_profesion', 'Profesiones', 'id_profesion', array('alias' => 'Profesiones'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'datosprofesiona';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datosprofesiona[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datosprofesiona
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
