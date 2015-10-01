<?php

class Documentosbeneficios extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_documentosbene;

    /**
     *
     * @var string
     */
    protected $documentos;

    /**
     *
     * @var integer
     */
    protected $id_tipobeneficio;

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
     * Method to set the value of field documentos
     *
     * @param string $documentos
     * @return $this
     */
    public function setDocumentos($documentos)
    {
        $this->documentos = $documentos;

        return $this;
    }

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
     * Returns the value of field id_documentosbene
     *
     * @return integer
     */
    public function getIdDocumentosbene()
    {
        return $this->id_documentosbene;
    }

    /**
     * Returns the value of field documentos
     *
     * @return string
     */
    public function getDocumentos()
    {
        return $this->documentos;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_documentosbene', 'DoctrabBeneficio', 'id_documentosbene', array('alias' => 'DoctrabBeneficio'));
        $this->belongsTo('id_tipobeneficio', 'Tiposbeneficios', 'id_tipobeneficio', array('alias' => 'Tiposbeneficios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'documentosbeneficios';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Documentosbeneficios[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Documentosbeneficios
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
            'id_documentosbene' => 'id_documentosbene',
            'documentos' => 'documentos',
            'id_tipobeneficio' => 'id_tipobeneficio'
        );
    }

}
