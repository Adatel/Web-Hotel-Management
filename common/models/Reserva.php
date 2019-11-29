<?php

namespace common\models;

use common\models\ReservaQuarto;
use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property string $data_entrada
 * @property string $data_saida
 * @property int $num_pessoas
 * @property int $num_quartos
 * @property string $tipo_quarto
 * @property int|null $quarto_solteiro
 * @property int $quarto_duplo
 * @property int $quarto_familia
 * @property int $quarto_casal
 * @property int $id_cliente
 * @property int $id_reserva
 *
 * @property Pagamento[] $pagamentos
 * @property Profile $cliente
 * @property ReservaQuarto[] $reservaQuartos
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_entrada', 'data_saida', 'num_pessoas', 'num_quartos', 'tipo_quarto', 'id_cliente'], 'required'],
            [['data_entrada', 'data_saida'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_cliente' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_entrada' => 'Data Entrada',
            'data_saida' => 'Data Saida',
            'num_pessoas' => 'Número de Pessoas',
            'num_quartos' => 'Número de Quartos',
            'quarto_solteiro' => 'Quarto de Solteiro',
            'quarto_duplo' => 'Quarto Duplo',
            'quarto_familia' => 'Quarto de Familia',
            'quarto_casal' => 'Quarto de Casal',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['id_reserva' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Profile::className(), ['id_user' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservaQuartos()
    {
        return $this->hasMany(ReservaQuarto::className(), ['id_reserva' => 'id']);
    }
}
