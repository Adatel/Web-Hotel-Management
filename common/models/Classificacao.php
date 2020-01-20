<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Classificacao".
 *
 * @property int $id
 * @property string $quarto
 * @property string $comida
 * @property string $staff
 * @property string $serviços
 * @property string $geral
 * @property int $id_cliente
 */
class Classificacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Classificacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quarto', 'comida', 'staff', 'serviços', 'geral'], 'number'],
            [['id_cliente'], 'required'],
            [['id_cliente'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quarto' => 'Quarto',
            'comida' => 'Comida',
            'staff' => 'Staff',
            'serviços' => 'Serviços',
            'geral' => 'Geral',
            'id_cliente' => 'Id Cliente',
        ];
    }
}
