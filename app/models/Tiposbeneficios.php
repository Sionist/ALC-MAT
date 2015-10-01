<?php

class Tiposbeneficios extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_tipobeneficio;

    /**
     *
     * @var string
     */
    protected $beneficios;

    /**
     * Method to set the value of field id_tipobeneficio
     *
     * @param integer $id_tipobeneficio
     * @return $this
     */
    public function setIdTipobeneficio($id_tipobeneficio)
    {
        $this->id_tipobeneficio = $id_tipobeneficio;

        return $this;
    }

    /**
     * Method to set the value of field beneficios
     *
     * @param string $beneficios
     * @return $this
     */
    public function setBeneficios($beneficios)
    {
        $this->beneficios = $beneficios;

        return $this;
    }

    /**
     * Returns the value of field id_tipobeneficio
     *
     * @return integer
     */
    public function getIdTipobeneficio()
    {
        return $this->id_tipobeneficio;
    }

    /**
     * Returns the value of field beneficios
     *
     * @return string
     */
    public function getBeneficios()
    {
        return $this->beneficios;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_tipobeneficio', 'Documentosbeneficios', 'id_tipobeneficio', array('alias' => 'Documentosbeneficios'));
        $this->hasMany('id_tipobeneficio', 'Documentosbeneficios', 'id_tipobeneficio', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tiposbeneficios';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tiposbeneficios[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tiposbeneficios
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
