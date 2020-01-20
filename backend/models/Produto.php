<?php

namespace backend\models;

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
            'designacao' => 'Designação',
            'preco_unitario' => 'Preço Unitário',
            'id_tipo' => 'Tipo',
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

    /**
     * @return string
     */
    public function getDesignacao()
    {
        return $this->designacao;
    }

    /**
     * @param string $designacao
     */
    public function setDesignacao($designacao)
    {
        $this->designacao = $designacao;
    }

    /**
     * @return string
     */
    public function getPrecoUnitario()
    {
        return $this->preco_unitario;
    }

    /**
     * @param string $preco_unitario
     */
    public function setPrecoUnitario($preco_unitario)
    {
        $this->preco_unitario = $preco_unitario;
    }


}
