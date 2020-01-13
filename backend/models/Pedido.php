<?php

namespace backend\models;

use app\models\LinhaProduto;
use common\models\Profile;
use common\models\ReservaQuarto;
use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property string $data_hora
 * @property string $custo
 * @property int $id_reservaquarto
 * @property int $id_funcionario
 *
 * @property LinhaProduto[] $linhaProdutos
 * @property ReservaQuarto $reservaquarto
 * @property Profile $funcionario
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_hora', 'custo', 'id_reservaquarto'], 'required'],
            [['data_hora'], 'safe'],
            [['custo'], 'number'],
            [['id_reservaquarto'], 'integer'],
            [['id_reservaquarto'], 'exist', 'skipOnError' => true, 'targetClass' => ReservaQuarto::className(), 'targetAttribute' => ['id_reservaquarto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_hora' => 'Data e Hora',
            'custo' => 'Custo',
            'id_reservaquarto' => 'Reserva do Quarto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaProdutos()
    {
        return $this->hasMany(LinhaProduto::className(), ['id_pedido' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservaquarto()
    {
        return $this->hasOne(ReservaQuarto::className(), ['id' => 'id_reservaquarto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Profile::className(), ['id_user' => 'id_funcionario']);
    }
}
