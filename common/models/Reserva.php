<?php

namespace common\models;

use app\models\Pagamento;
use app\models\ReservaQuarto;
use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property string $data_entrada
 * @property string $data_saida
 * @property int $num_pessoas
 * @property int $quarto_solteiro
 * @property int $quarto_duplo
 * @property int $quarto_familia
 * @property int $quarto_casal
 * @property int $id_cliente
 * @property int $id_funcionario
 *
 * @property Pagamento[] $pagamentos
 * @property Profile $cliente
 * @property Profile $funcionario
 * @property ReservaQuarto[] $reservaQuartos
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_entrada', 'data_saida', 'num_pessoas', 'id_cliente'], 'required'],
            [['data_entrada', 'data_saida'], 'safe'],
            [['num_pessoas', 'quarto_solteiro', 'quarto_duplo', 'quarto_familia', 'quarto_casal', 'id_cliente', 'id_funcionario'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_cliente' => 'id_user']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_funcionario' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_entrada' => 'Data Entrada',
            'data_saida' => 'Data Saida',
            'num_pessoas' => 'Num Pessoas',
            'quarto_solteiro' => 'Quarto Solteiro',
            'quarto_duplo' => 'Quarto Duplo',
            'quarto_familia' => 'Quarto Familia',
            'quarto_casal' => 'Quarto Casal',
            'id_cliente' => 'Id Cliente',
            'id_funcionario' => 'Id Funcionario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['id_reserva' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Profile::className(), ['id_user' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Profile::className(), ['id_user' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservaQuartos()
    {
        return $this->hasMany(ReservaQuarto::className(), ['id_reserva' => 'id']);
    }
}
