<?php

class UsuariosPermisos extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var integer
     */
    protected $permiso_id;

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field permiso_id
     *
     * @param integer $permiso_id
     * @return $this
     */
    public function setPermisoId($permiso_id)
    {
        $this->permiso_id = $permiso_id;

        return $this;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field permiso_id
     *
     * @return integer
     */
    public function getPermisoId()
    {
        return $this->permiso_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_id', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('permiso_id', 'Permisos', 'id', array('alias' => 'Permisos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuarios-permisos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuarios-permisos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuarios-permisos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
