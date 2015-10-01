<?php

class NbEmbargos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_embargo;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $porcentaje_emb;

    /**
     *
     * @var integer
     */
    protected $num_exp;

    /**
     *
     * @var integer
     */
    protected $id_fondo;

    /**
     *
     * @var integer
     */
    protected $ci_bene;

    /**
     *
     * @var string
     */
    protected $nombres;

    /**
     *
     * @var integer
     */
    protected $tribunal;

    /**
     *
     * @var string
     */
    protected $f_emb;

    /**
     * Method to set the value of field id_embargo
     *
     * @param integer $id_embargo
     * @return $this
     */
    public function setIdEmbargo($id_embargo)
    {
        $this->id_embargo = $id_embargo;

        return $this;
    }

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
     * Method to set the value of field porcentaje_emb
     *
     * @param integer $porcentaje_emb
     * @return $this
     */
    public function setPorcentajeEmb($porcentaje_emb)
    {
        $this->porcentaje_emb = $porcentaje_emb;

        return $this;
    }

    /**
     * Method to set the value of field num_exp
     *
     * @param integer $num_exp
     * @return $this
     */
    public function setNumExp($num_exp)
    {
        $this->num_exp = $num_exp;

        return $this;
    }

    /**
     * Method to set the value of field id_fondo
     *
     * @param integer $id_fondo
     * @return $this
     */
    public function setIdFondo($id_fondo)
    {
        $this->id_fondo = $id_fondo;

        return $this;
    }

    /**
     * Method to set the value of field ci_bene
     *
     * @param integer $ci_bene
     * @return $this
     */
    public function setCiBene($ci_bene)
    {
        $this->ci_bene = $ci_bene;

        return $this;
    }

    /**
     * Method to set the value of field nombres
     *
     * @param string $nombres
     * @return $this
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Method to set the value of field tribunal
     *
     * @param integer $tribunal
     * @return $this
     */
    public function setTribunal($tribunal)
    {
        $this->tribunal = $tribunal;

        return $this;
    }

    /**
     * Method to set the value of field f_emb
     *
     * @param string $f_emb
     * @return $this
     */
    public function setFEmb($f_emb)
    {
        $this->f_emb = $f_emb;

        return $this;
    }

    /**
     * Returns the value of field id_embargo
     *
     * @return integer
     */
    public function getIdEmbargo()
    {
        return $this->id_embargo;
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
     * Returns the value of field porcentaje_emb
     *
     * @return integer
     */
    public function getPorcentajeEmb()
    {
        return $this->porcentaje_emb;
    }

    /**
     * Returns the value of field num_exp
     *
     * @return integer
     */
    public function getNumExp()
    {
        return $this->num_exp;
    }

    /**
     * Returns the value of field id_fondo
     *
     * @return integer
     */
    public function getIdFondo()
    {
        return $this->id_fondo;
    }

    /**
     * Returns the value of field ci_bene
     *
     * @return integer
     */
    public function getCiBene()
    {
        return $this->ci_bene;
    }

    /**
     * Returns the value of field nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Returns the value of field tribunal
     *
     * @return integer
     */
    public function getTribunal()
    {
        return $this->tribunal;
    }

    /**
     * Returns the value of field f_emb
     *
     * @return string
     */
    public function getFEmb()
    {
        return $this->f_emb;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_embargo', 'Recibos', 'id_embargo', array('alias' => 'Recibos'));
        $this->belongsTo('id_fondo', 'FondoDesc', 'id_fondo', array('alias' => 'FondoDesc'));
        $this->hasMany('id_embargo', 'Recibos', 'id_embargo', NULL);
        $this->belongsTo('id_fondo', 'Fondodesc', 'id_fondo', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nb_embargos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbEmbargos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NbEmbargos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
