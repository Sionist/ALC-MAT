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
     * @var string
     */
    protected $porcentaje_emb;

    /**
     *
     * @var string
     */
    protected $num_exp;

    /**
     *
     * @var integer
     */
    protected $id_fondo;

    /**
     *
     * @var string
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
     * @param string $porcentaje_emb
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
     * @param string $num_exp
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
     * Method to set the value of field tribunal
     *
     * @param string $tribunal
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
     * @return string
     */
    public function getPorcentajeEmb()
    {
        return $this->porcentaje_emb;
    }

    /**
     * Returns the value of field num_exp
     *
     * @return string
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
     * Returns the value of field tribunal
     *
     * @return string
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
		$this->hasMany('nu_cedula', 'Beneficiados', 'nu_cedula', array('alias' => 'Beneficiados'));
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

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id_embargo' => 'id_embargo',
            'nu_cedula' => 'nu_cedula',
            'porcentaje_emb' => 'porcentaje_emb',
            'num_exp' => 'num_exp',
            'id_fondo' => 'id_fondo',
            'tribunal' => 'tribunal',
            'f_emb' => 'f_emb'
        );
    }

}
