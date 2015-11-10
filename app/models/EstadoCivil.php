<?php

class EstadoCivil extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $estado_civil;

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
     * Method to set the value of field estado_civil
     *
     * @param string $estado_civil
     * @return $this
     */
    public function setEstadoCivil($estado_civil)
    {
        $this->estado_civil = $estado_civil;

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
     * Returns the value of field estado_civil
     *
     * @return string
     */
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'estado_civil';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EstadoCivil[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EstadoCivil
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
