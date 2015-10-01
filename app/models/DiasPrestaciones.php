<?php

class DiasPrestaciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_diaspres;

    /**
     *
     * @var string
     */
    protected $concepto;

    /**
     *
     * @var integer
     */
    protected $diascc;

    /**
     * Method to set the value of field id_diaspres
     *
     * @param integer $id_diaspres
     * @return $this
     */
    public function setIdDiaspres($id_diaspres)
    {
        $this->id_diaspres = $id_diaspres;

        return $this;
    }

    /**
     * Method to set the value of field concepto
     *
     * @param string $concepto
     * @return $this
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Method to set the value of field diascc
     *
     * @param integer $diascc
     * @return $this
     */
    public function setDiascc($diascc)
    {
        $this->diascc = $diascc;

        return $this;
    }

    /**
     * Returns the value of field id_diaspres
     *
     * @return integer
     */
    public function getIdDiaspres()
    {
        return $this->id_diaspres;
    }

    /**
     * Returns the value of field concepto
     *
     * @return string
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Returns the value of field diascc
     *
     * @return integer
     */
    public function getDiascc()
    {
        return $this->diascc;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_diaspres', 'Fideicomiso', 'id_diaspres', array('alias' => 'Fideicomiso'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'dias_prestaciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DiasPrestaciones[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DiasPrestaciones
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
            'id_diaspres' => 'id_diaspres',
            'concepto' => 'concepto',
            'diascc' => 'diascc'
        );
    }

}
