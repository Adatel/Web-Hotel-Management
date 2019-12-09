<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quarto".
 *
 * @property int $num_quarto
 * @property int $id_tipo
 * @property int|null $estado
 *
 * @property TipoQuarto $tipo
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
            [['num_quarto', 'id_tipo'], 'required'],
            [['num_quarto', 'id_tipo', 'estado'], 'integer'],
            [['num_quarto'], 'unique'],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoQuarto::className(), 'targetAttribute' => ['id_tipo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_quarto' => 'Num Quarto',
            'id_tipo' => 'Id Tipo',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(TipoQuarto::className(), ['id' => 'id_tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservaQuartos()
    {
        return $this->hasMany(ReservaQuarto::className(), ['id_quarto' => 'num_quarto']);
    }

    public function criarQuarto(){
        $quarto = new Quarto();
        $quarto->num_quarto = $this->num_quarto;
        $quarto->id_tipo = $this->id_tipo;
        $quarto->estado = $this->estado;



        $quarto->save();


    }
}
