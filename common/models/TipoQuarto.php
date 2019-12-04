<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_quarto".
 *
 * @property int $id
 * @property string $designacao
 * @property float $preco_noite
 *
 * @property Quarto[] $quartos
 */
class TipoQuarto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_quarto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'preco_noite'], 'required'],
            [['preco_noite'], 'number'],
            [['designacao'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'designacao' => 'Designacao',
            'preco_noite' => 'Preco Noite',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuartos()
    {
        return $this->hasMany(Quarto::className(), ['id_tipo' => 'id']);
    }
}
