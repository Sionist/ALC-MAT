<?php

class Convenciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_convencion;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var string
     */
    protected $fecha;

    /**
     *
     * @var integer
     */
    protected $duracion;

    /**
     *
     * @var string
     */
    protected $activa;

    /**
     * Method to set the value of field id_convencion
     *
     * @param integer $id_convencion
     * @return $this
     */
    public function setIdConvencion($id_convencion)
    {
        $this->id_convencion = $id_convencion;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
     * Method to set the value of field duracion
     *
     * @param integer $duracion
     * @return $this
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

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
     * Returns the value of field id_convencion
     *
     * @return integer
     */
    public function getIdConvencion()
    {
        return $this->id_convencion;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Returns the value of field duracion
     *
     * @return integer
     */
    public function getDuracion()
    {
        return $this->duracion;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_convencion', 'Clausulas', 'id_clausula', array('alias' => 'Clausulas'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'convenciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Convenciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Convenciones
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
            'id_convencion' => 'id_convencion',
            'descripcion' => 'descripcion',
            'fecha' => 'fecha',
            'duracion' => 'duracion',
            'activa' => 'activa'
        );
    }

}
