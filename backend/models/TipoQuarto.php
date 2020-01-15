<?php

namespace backend\models;

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
            'designacao' => 'Designação',
            'preco_noite' => 'Preço por Noite',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuartos()
    {
        return $this->hasMany(Quarto::className(), ['id_tipo' => 'id']);
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
     * @return float
     */
    public function getPrecoNoite()
    {
        return $this->preco_noite;
    }

    /**
     * @param float $preco_noite
     */
    public function setPrecoNoite($preco_noite)
    {
        $this->preco_noite = $preco_noite;
    }


}
