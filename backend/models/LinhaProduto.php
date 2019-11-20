<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linha_produto".
 *
 * @property int $id
 * @property int $quantidade
 * @property int $id_produto
 * @property int $id_pedido
 *
 * @property Pedido $pedido
 * @property Produto $produto
 */
class LinhaProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linha_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'id_produto', 'id_pedido'], 'required'],
            [['quantidade', 'id_produto', 'id_pedido'], 'integer'],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['id_pedido' => 'id']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantidade' => 'Quantidade',
            'id_produto' => 'Id Produto',
            'id_pedido' => 'Id Pedido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'id_pedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'id_produto']);
    }
}
