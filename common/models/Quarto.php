<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quarto".
 *
 * @property int $num_quarto
 * @property string $designacao_tipo
 * @property int $estado
 * @property string $preco_noite
 *
 * @property ReservaQuarto[] $reservaQuartos
 */
class Quarto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quarto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_quarto', 'designacao_tipo', 'preco_noite'], 'required'],
            [['num_quarto', 'estado'], 'integer'],
            [['preco_noite'], 'number'],
            [['designacao_tipo'], 'string', 'max' => 50],
            [['num_quarto'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_quarto' => 'Num Quarto',
            'designacao_tipo' => 'Designacao Tipo',
            'estado' => 'Estado',
            'preco_noite' => 'Preco Noite',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservaQuartos()
    {
        return $this->hasMany(ReservaQuarto::className(), ['id_quarto' => 'num_quarto']);
    }
}
