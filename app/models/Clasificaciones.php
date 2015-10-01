<?php

class Clasificaciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_clasi;

    /**
     *
     * @var integer
     */
    protected $id_clausula;

    /**
     *
     * @var integer
     */
    protected $minimo;

    /**
     *
     * @var integer
     */
    protected $maximo;

    /**
     *
     * @var integer
     */
    protected $tiempo;

    /**
     *
     * @var integer
     */
    protected $monto;

    /**
     * Method to set the value of field id_clasi
     *
     * @param integer $id_clasi
     * @return $this
     */
    public function setIdClasi($id_clasi)
    {
        $this->id_clasi = $id_clasi;

        return $this;
    }

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
     * Method to set the value of field minimo
     *
     * @param integer $minimo
     * @return $this
     */
    public function setMinimo($minimo)
    {
        $this->minimo = $minimo;

        return $this;
    }

    /**
     * Method to set the value of field maximo
     *
     * @param integer $maximo
     * @return $this
     */
    public function setMaximo($maximo)
    {
        $this->maximo = $maximo;

        return $this;
    }

    /**
     * Method to set the value of field tiempo
     *
     * @param integer $tiempo
     * @return $this
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Method to set the value of field monto
     *
     * @param integer $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Returns the value of field id_clasi
     *
     * @return integer
     */
    public function getIdClasi()
    {
        return $this->id_clasi;
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
     * Returns the value of field minimo
     *
     * @return integer
     */
    public function getMinimo()
    {
        return $this->minimo;
    }

    /**
     * Returns the value of field maximo
     *
     * @return integer
     */
    public function getMaximo()
    {
        return $this->maximo;
    }

    /**
     * Returns the value of field tiempo
     *
     * @return integer
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Returns the value of field monto
     *
     * @return integer
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_clausula', 'Clausulas', 'id_clausula', array('alias' => 'Clausulas'));
        $this->belongsTo('id_clausula', 'Clausulas', 'id_clausula', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'clasificaciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Clasificaciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Clasificaciones
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
