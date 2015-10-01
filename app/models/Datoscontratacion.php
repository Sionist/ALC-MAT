<?php

class Datoscontratacion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_contratacion;

    /**
     *
     * @var integer
     */
    public $nu_cedula;

    /**
     *
     * @var string
     */
    public $f_ing;

    /**
     *
     * @var string
     */
    public $f_egre;

    /**
     *
     * @var integer
     */
    public $tipo_nom;

    /**
     *
     * @var integer
     */
    public $liquidac;

    /**
     *
     * @var string
     */
    public $f_pago_liq;

    /**
     *
     * @var integer
     */
    public $t_cargo;

    /**
     *
     * @var integer
     */
    public $tipo_cont;

    /**
     *
     * @var integer
     */
    public $ubi_nom;

    /**
     *
     * @var integer
     */
    public $ubi_fun;

    /**
     * Method to set the value of field id_contratacion
     *
     * @param integer $id_contratacion
     * @return $this
     */
    public function setIdContratacion($id_contratacion)
    {
        $this->id_contratacion = $id_contratacion;

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
     * Method to set the value of field f_ing
     *
     * @param string $f_ing
     * @return $this
     */
    public function setFIng($f_ing)
    {
        $this->f_ing = $f_ing;

        return $this;
    }

    /**
     * Method to set the value of field f_egre
     *
     * @param string $f_egre
     * @return $this
     */
    public function setFEgre($f_egre)
    {
        $this->f_egre = $f_egre;

        return $this;
    }

    /**
     * Method to set the value of field tipo_nom
     *
     * @param integer $tipo_nom
     * @return $this
     */
    public function setTipoNom($tipo_nom)
    {
        $this->tipo_nom = $tipo_nom;

        return $this;
    }

    /**
     * Method to set the value of field liquidac
     *
     * @param integer $liquidac
     * @return $this
     */
    public function setLiquidac($liquidac)
    {
        $this->liquidac = $liquidac;

        return $this;
    }

    /**
     * Method to set the value of field f_pago_liq
     *
     * @param string $f_pago_liq
     * @return $this
     */
    public function setFPagoLiq($f_pago_liq)
    {
        $this->f_pago_liq = $f_pago_liq;

        return $this;
    }

    /**
     * Method to set the value of field t_cargo
     *
     * @param integer $t_cargo
     * @return $this
     */
    public function setTCargo($t_cargo)
    {
        $this->t_cargo = $t_cargo;

        return $this;
    }

    /**
     * Method to set the value of field tipo_cont
     *
     * @param integer $tipo_cont
     * @return $this
     */
    public function setTipoCont($tipo_cont)
    {
        $this->tipo_cont = $tipo_cont;

        return $this;
    }

    /**
     * Method to set the value of field ubi_nom
     *
     * @param integer $ubi_nom
     * @return $this
     */
    public function setUbiNom($ubi_nom)
    {
        $this->ubi_nom = $ubi_nom;

        return $this;
    }

    /**
     * Method to set the value of field ubi_fun
     *
     * @param integer $ubi_fun
     * @return $this
     */
    public function setUbiFun($ubi_fun)
    {
        $this->ubi_fun = $ubi_fun;

        return $this;
    }

    /**
     * Returns the value of field id_contratacion
     *
     * @return integer
     */
    public function getIdContratacion()
    {
        return $this->id_contratacion;
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
     * Returns the value of field f_ing
     *
     * @return string
     */
    public function getFIng()
    {
        return $this->f_ing;
    }

    /**
     * Returns the value of field f_egre
     *
     * @return string
     */
    public function getFEgre()
    {
        return $this->f_egre;
    }

    /**
     * Returns the value of field tipo_nom
     *
     * @return integer
     */
    public function getTipoNom()
    {
        return $this->tipo_nom;
    }

    /**
     * Returns the value of field liquidac
     *
     * @return integer
     */
    public function getLiquidac()
    {
        return $this->liquidac;
    }

    /**
     * Returns the value of field f_pago_liq
     *
     * @return string
     */
    public function getFPagoLiq()
    {
        return $this->f_pago_liq;
    }

    /**
     * Returns the value of field t_cargo
     *
     * @return integer
     */
    public function getTCargo()
    {
        return $this->t_cargo;
    }

    /**
     * Returns the value of field tipo_cont
     *
     * @return integer
     */
    public function getTipoCont()
    {
        return $this->tipo_cont;
    }

    /**
     * Returns the value of field ubi_nom
     *
     * @return integer
     */
    public function getUbiNom()
    {
        return $this->ubi_nom;
    }

    /**
     * Returns the value of field ubi_fun
     *
     * @return integer
     */
    public function getUbiFun()
    {
        return $this->ubi_fun;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('nu_cedula', 'Cargafamiliar', 'nu_cedula', array('alias' => 'Cargafamiliar'));
        $this->belongsTo('nu_cedula', 'Datospersonales', 'nu_cedula', array('alias' => 'Datospersonales'));
        $this->belongsTo('tipo_nom', 'TipoNomi', 'id_nomina', array('alias' => 'TipoNomi'));
        $this->belongsTo('t_cargo', 'Cargos', 'id_cargo', array('alias' => 'Cargos'));
        $this->belongsTo('tipo_cont', 'TipoContrat', 'id_contrato', array('alias' => 'TipoContrat'));
        $this->belongsTo('ubi_nom', 'NbDireciones', 'id_direcciones', array('alias' => 'NbDireciones'));
        $this->belongsTo('ubi_fun', 'NbDireciones', 'id_direcciones', array('alias' => 'NbDireciones'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'datoscontratacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datoscontratacion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Datoscontratacion
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
            'id_contratacion' => 'id_contratacion',
            'nu_cedula' => 'nu_cedula',
            'f_ing' => 'f_ing',
            'f_egre' => 'f_egre',
            'tipo_nom' => 'tipo_nom',
            'liquidac' => 'liquidac',
            'f_pago_liq' => 'f_pago_liq',
            't_cargo' => 't_cargo',
            'tipo_cont' => 'tipo_cont',
            'ubi_nom' => 'ubi_nom',
            'ubi_fun' => 'ubi_fun'
        );
    }

}
