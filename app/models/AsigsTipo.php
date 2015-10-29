<?php

class AsigsTipo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_tipo;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     * Method to set the value of field id_tipo
     *
     * @param integer $id_tipo
     * @return $this
     */
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

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
     * Returns the value of field id_tipo
     *
     * @return integer
     */
    public function getIdTipo()
    {
        return $this->id_tipo;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_tipo', 'NbAsignaciones', 'tipo', array('alias' => 'NbAsignaciones'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'asigs_tipo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AsigsTipo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AsigsTipo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
