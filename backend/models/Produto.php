<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $designacao
 * @property string $preco_unitario
 * @property int $id_tipo
 *
 * @property LinhaProduto[] $linhaProdutos
 * @property TipoProduto $tipo
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'preco_unitario', 'id_tipo'], 'required'],
            [['preco_unitario'], 'number'],
            [['id_tipo'], 'integer'],
            [['designacao'], 'string', 'max' => 50],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProduto::className(), 'targetAttribute' => ['id_tipo' => 'id']],
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
            'preco_unitario' => 'Preco Unitario',
            'id_tipo' => 'Id Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaProdutos()
    {
        return $this->hasMany(LinhaProduto::className(), ['id_produto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(TipoProduto::className(), ['id' => 'id_tipo']);
    }
}
