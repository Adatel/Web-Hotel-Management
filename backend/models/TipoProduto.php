<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipoproduto".
 *
 * @property int $id
 * @property string $descricao_tipo
 *
 * @property Produto[] $produtos
 */
class TipoProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao_tipo'], 'required'],
            [['descricao_tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao_tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_tipo' => 'id']);
    }
}
