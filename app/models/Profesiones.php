<?php

class Profesiones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_profesion;

    /**
     *
     * @var string
     */
    public $profesion;

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
     * Method to set the value of field profesion
     *
     * @param string $profesion
     * @return $this
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;

        return $this;
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
     * Returns the value of field profesion
     *
     * @return string
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_profesion', 'Datosprofesiona', 'id_profesion', array('alias' => 'Datosprofesiona'));
        $this->hasMany('id_profesion', 'Datosprofesiona', 'id_profesion', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'profesiones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Profesiones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Profesiones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
