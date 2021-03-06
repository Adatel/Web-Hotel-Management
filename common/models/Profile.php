<?php

namespace common\models;

use backend\models\Pedido;
use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property string $nome
 * @property int $nif
 * @property int $telemovel
 * @property string $morada
 * @property int $is_admin
 * @property int $is_funcionario
 * @property int $is_cliente
 * @property int $id_user
 *
 * @property Pedido[] $pedidos
 * @property User $user
 * @property Reserva[] $reservas
 * @property Reserva[] $reservas0
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'nif', 'telemovel', 'morada', 'id_user'], 'required'],
            [['nif', 'telemovel', 'is_admin', 'is_funcionario', 'is_cliente', 'id_user'], 'integer'],
            [['nome', 'morada'], 'string', 'max' => 80],
            [['nif'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'nif' => 'NIF',
            'telemovel' => 'Telemóvel',
            'morada' => 'Morada',
            'is_admin' => 'Administrador',
            'is_funcionario' => 'Funcionario',
            'is_cliente' => 'Cliente',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_funcionario' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['id_cliente' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas0()
    {
        return $this->hasMany(Reserva::className(), ['id_funcionario' => 'id_user']);
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param int $nif
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
    }

    /**
     * @return int
     */
    public function getTelemovel()
    {
        return $this->telemovel;
    }

    /**
     * @param int $telemovel
     */
    public function setTelemovel($telemovel)
    {
        $this->telemovel = $telemovel;
    }

    /**
     * @return string
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * @param string $morada
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;
    }



}
