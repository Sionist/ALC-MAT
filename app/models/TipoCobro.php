<?php

class TipoCobro extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_cobro;

    /**
     *
     * @var string
     */
    protected $nb_cobro;

    /**
     * Method to set the value of field id_cobro
     *
     * @param integer $id_cobro
     * @return $this
     */
    public function setIdCobro($id_cobro)
    {
        $this->id_cobro = $id_cobro;

        return $this;
    }

    /**
     * Method to set the value of field nb_cobro
     *
     * @param string $nb_cobro
     * @return $this
     */
    public function setNbCobro($nb_cobro)
    {
        $this->nb_cobro = $nb_cobro;

        return $this;
    }

    /**
     * Returns the value of field id_cobro
     *
     * @return integer
     */
    public function getIdCobro()
    {
        return $this->id_cobro;
    }

    /**
     * Returns the value of field nb_cobro
     *
     * @return string
     */
    public function getNbCobro()
    {
        return $this->nb_cobro;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_cobro';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoCobro[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoCobro
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
