<?php

class NbBancos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_bancos;

    /**
     *
     * @var string
     */
    public $nb_bancos;

    /**
     * Method to set the value of field id_bancos
     *
     * @param integer $id_bancos
     * @return $this
     */
    public function setIdBancos($id_bancos)
    {
        $this->id_bancos = $id_bancos;

        return $this;
    }

    /**
     * Method to set the value of field nb_bancos
     *
     * @param string $nb_bancos
     * @return $this
     */
    public function setNbBancos($nb_bancos)
    {
        $this->nb_bancos = $nb_bancos;

        return $this;
    }

    /**
     * Returns the value of field id_bancos
     *
     * @return integer
     */
    public function getIdBancos()
    {
        return $this->id_bancos;
    }

    /**
     * Returns the value of field nb_bancos
     *
     * @return string
     */
    public function getNbBancos()
    {
        return $this->nb_bancos;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_bancos', 'Datosfinancieros', 'cod_banco', array('alias' => 'Datosfinancieros'));
        $this->hasMany('id_bancos', 'Datosfinancieros', 'cod_banco', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_bancos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbBancos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbBancos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
