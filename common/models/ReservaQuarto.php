<?php

namespace common\models;

use app\models\Pedido;
use Yii;

/**
 * This is the model class for table "reserva_quarto".
 *
 * @property int $id
 * @property string $tipo_quarto
 * @property int $id_reserva
 * @property int $id_quarto
 *
 * @property Pedido[] $pedidos
 * @property Reserva $reserva
 * @property Quarto $quarto
 */
class ReservaQuarto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva_quarto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_quarto', 'id_reserva', 'id_quarto'], 'required'],
            [['id_reserva', 'id_quarto'], 'integer'],
            [['tipo_quarto'], 'string', 'max' => 50],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'id']],
            [['id_quarto'], 'exist', 'skipOnError' => true, 'targetClass' => Quarto::className(), 'targetAttribute' => ['id_quarto' => 'num_quarto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_quarto' => 'Tipo de Quarto',
            'id_reserva' => 'Id Reserva',
            'id_quarto' => 'Id Quarto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_reservaquarto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id' => 'id_reserva']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuarto()
    {
        return $this->hasOne(Quarto::className(), ['num_quarto' => 'id_quarto']);
    }
}