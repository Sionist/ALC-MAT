<?php

class DoctrabBeneficio extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_doctrab_bene;

    /**
     *
     * @var integer
     */
    protected $nu_cedula;

    /**
     *
     * @var integer
     */
    protected $id_documentosbene;

    /**
     * Method to set the value of field id_doctrab_bene
     *
     * @param integer $id_doctrab_bene
     * @return $this
     */
    public function setIdDoctrabBene($id_doctrab_bene)
    {
        $this->id_doctrab_bene = $id_doctrab_bene;

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
     * Method to set the value of field id_documentosbene
     *
     * @param integer $id_documentosbene
     * @return $this
     */
    public function setIdDocumentosbene($id_documentosbene)
    {
        $this->id_documentosbene = $id_documentosbene;

        return $this;
    }

    /**
     * Returns the value of field id_doctrab_bene
     *
     * @return integer
     */
    public function getIdDoctrabBene()
    {
        return $this->id_doctrab_bene;
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
     * Returns the value of field id_documentosbene
     *
     * @return integer
     */
    public function getIdDocumentosbene()
    {
        return $this->id_documentosbene;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_documentosbene', 'Documentosbeneficios', 'id_documentosbene', array('alias' => 'Documentosbeneficios'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->hasMany('id_documentosbene', 'Documentosbeneficios', 'id_documentosbene', NULL);
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('foreignKey' => true));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'doctrab_beneficio';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DoctrabBeneficio[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DoctrabBeneficio
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
