<?php

class Parentesco extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_parentesco;

    /**
     *
     * @var integer
     */
    protected $parentesco;

    /**
     * Method to set the value of field id_parentesco
     *
     * @param integer $id_parentesco
     * @return $this
     */
    public function setIdParentesco($id_parentesco)
    {
        $this->id_parentesco = $id_parentesco;

        return $this;
    }

    /**
     * Method to set the value of field parentesco
     *
     * @param integer $parentesco
     * @return $this
     */
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Returns the value of field id_parentesco
     *
     * @return integer
     */
    public function getIdParentesco()
    {
        return $this->id_parentesco;
    }

    /**
     * Returns the value of field parentesco
     *
     * @return integer
     */
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_parentesco', 'Cargafamiliar', 'id_parentesco', array('alias' => 'Cargafamiliar'));
       
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'parentesco';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Parentesco[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Parentesco
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
