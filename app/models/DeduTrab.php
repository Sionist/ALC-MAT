<?php

class DeduTrab extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_dedutrab;

    /**
     *
     * @var integer
     */
    public $nu_cedula;

    /**
     *
     * @var integer
     */
    public $semana_quin;

    /**
     *
     * @var integer
     */
    public $monto;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'dedu_trab';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DeduTrab[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DeduTrab
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
