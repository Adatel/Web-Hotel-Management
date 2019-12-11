<?php

namespace backend\models;

use common\models\Profile;
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
            [['data_hora', 'custo', 'id_reservaquarto', 'id_funcionario'], 'required'],
            [['data_hora'], 'safe'],
            [['custo'], 'number'],
            [['id_reservaquarto', 'id_funcionario'], 'integer'],
            [['id_reservaquarto'], 'exist', 'skipOnError' => true, 'targetClass' => ReservaQuarto::className(), 'targetAttribute' => ['id_reservaquarto' => 'id']],
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
            'data_hora' => 'Data Hora',
            'custo' => 'Custo',
            'id_reservaquarto' => 'Id Reservaquarto',
            'id_funcionario' => 'Id Funcionario',
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
