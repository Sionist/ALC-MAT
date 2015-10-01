<?php

use Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Mvc\Model\Validator\Email as EmailValidator,
    Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator,
    Phalcon\Mvc\Model\Validator\StringLength as StringLengthValidator;

class Discapacidad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_discapacid;

    /**
     *
     * @var string
     */
    protected $discapacidad;

    /**
     * Method to set the value of field id_discapacid
     *
     * @param integer $id_discapacid
     * @return $this
     */
    public function setIdDiscapacid($id_discapacid)
    {
        $this->id_discapacid = $id_discapacid;

        return $this;
    }

    /**
     * Method to set the value of field discapacidad
     *
     * @param string $discapacidad
     * @return $this
     */
    public function setDiscapacidad($discapacidad)
    {
        $this->discapacidad = $discapacidad;

        return $this;
    }

    /**
     * Returns the value of field id_discapacid
     *
     * @return integer
     */
    public function getIdDiscapacid()
    {
        return $this->id_discapacid;
    }

    /**
     * Returns the value of field discapacidad
     *
     * @return string
     */
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_discapacid', 'CargaDiscapacidad', 'id_discapacid', array('alias' => 'CargaDiscapacidad'));
        $this->hasMany('id_discapacid', 'Datospersonales', 'id_discapacidad', array('alias' => 'Datospersonales'));
        $this->hasMany('id_discapacid', 'CargaDiscapacidad', 'id_discapacid', NULL);
        $this->hasMany('id_discapacid', 'Datospersonales', 'id_discapacidad', NULL);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'discapacidad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Discapacidad[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Discapacidad
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
	
	public function getMessages($filter = NULL)
    {
        $messages = array();
        foreach (parent::getMessages() as $message) 
        {
            switch ($message->getType()) 
            {
 
                case 'Unique':
                    $messages[] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>El nombre de la  ' . $message->getField() . ' ya está en uso.</div>';
                    break;
                case 'TooShort':
                    $messages[] = 'El campo ' . $message->getField() . ' es demasiado corto(min 2 chars).';
                    break;
                case 'TooLong':
                    $messages[] = 'El campo ' . $message->getField() . ' es demasiado largo(max 30 chars).';
                    break;
            }
        }
        return $messages;
    }
 
    /*
    * validamos el formulario
    */
    public function validation()
    {
        $this->validate(new UniquenessValidator(array(
            'field' => 'discapacidad'
        )));
        $this->validate(new StringLengthValidator(array(
            'field' => 'discapacidad',
            'max'   => 30,
            'min'   => 4
        )));

 
        if ($this->validationHasFailed() == true) 
        {
            return false;
        }
    }

    

}
