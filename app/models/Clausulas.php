<?php

class Clausulas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_clausula;

    /**
     *
     * @var integer
     */
    protected $id_convension;

    /**
     *
     * @var integer
     */
    protected $nclausula;

    /**
     *
     * @var string
     */
    protected $clausula;

    /**
     *
     * @var string
     */
    protected $activa;

    /**
     *
     * @var string
     */
    protected $observacion;

    /**
     * Method to set the value of field id_clausula
     *
     * @param integer $id_clausula
     * @return $this
     */
    public function setIdClausula($id_clausula)
    {
        $this->id_clausula = $id_clausula;

        return $this;
    }

    /**
     * Method to set the value of field id_convension
     *
     * @param integer $id_convension
     * @return $this
     */
    public function setIdConvension($id_convension)
    {
        $this->id_convension = $id_convension;

        return $this;
    }

    /**
     * Method to set the value of field nclausula
     *
     * @param integer $nclausula
     * @return $this
     */
    public function setNclausula($nclausula)
    {
        $this->nclausula = $nclausula;

        return $this;
    }

    /**
     * Method to set the value of field clausula
     *
     * @param string $clausula
     * @return $this
     */
    public function setClausula($clausula)
    {
        $this->clausula = $clausula;

        return $this;
    }

    /**
     * Method to set the value of field activa
     *
     * @param string $activa
     * @return $this
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Method to set the value of field observacion
     *
     * @param string $observacion
     * @return $this
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Returns the value of field id_clausula
     *
     * @return integer
     */
    public function getIdClausula()
    {
        return $this->id_clausula;
    }

    /**
     * Returns the value of field id_convension
     *
     * @return integer
     */
    public function getIdConvension()
    {
        return $this->id_convension;
    }

    /**
     * Returns the value of field nclausula
     *
     * @return integer
     */
    public function getNclausula()
    {
        return $this->nclausula;
    }

    /**
     * Returns the value of field clausula
     *
     * @return string
     */
    public function getClausula()
    {
        return $this->clausula;
    }

    /**
     * Returns the value of field activa
     *
     * @return string
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Returns the value of field observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_clausula', 'Clasificaciones', 'id_clausula', array('alias' => 'Clasificaciones'));
        $this->belongsTo('id_clausula', 'Convenciones', 'id_convencion', array('alias' => 'Convenciones'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'clausulas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Clausulas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Clausulas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id_clausula' => 'id_clausula',
            'id_convension' => 'id_convension',
            'nclausula' => 'nclausula',
            'clausula' => 'clausula',
            'activa' => 'activa',
            'observacion' => 'observacion'
        );
    }

}
