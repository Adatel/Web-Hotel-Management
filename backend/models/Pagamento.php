<?php

namespace backend\models;

use common\models\Reserva;
use Yii;

/**
 * This is the model class for table "pagamento".
 *
 * @property int $id
 * @property int $id_reserva
 * @property string $total
 *
 * @property Reserva $reserva
 */
class Pagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reserva', 'total'], 'required'],
            [['id_reserva'], 'integer'],
            [['total'], 'number'],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_reserva' => 'Reserva',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id' => 'id_reserva']);
    }
}
