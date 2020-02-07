<?php

namespace common\models;

use backend\models\Pagamento;

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
            [['data_entrada', 'data_saida', 'num_pessoas', 'num_quartos','quarto_solteiro', 'quarto_duplo', 'quarto_familia', 'quarto_casal', 'id_cliente'], 'required'],
            [['data_entrada', 'data_saida'], 'safe'],
            [['num_pessoas', 'num_quartos'], 'integer'],
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
            'data_entrada' => 'Data de Entrada',
            'data_saida' => 'Data de Saida',
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

    /**
     * @return array
     */
   /* public function getDirtyAttributes()
    {
        return $this->dirtyAttributes;
    }*/

    /**
     * @param array $dirtyAttributes
     */
    public function setDirtyAttributes($dirtyAttributes)
    {
        $this->dirtyAttributes = $dirtyAttributes;
    }

    /**
     * @return string
     */
    public function getDataEntrada()
    {
        return $this->data_entrada;
    }

    /**
     * @param string $data_entrada
     */
    public function setDataEntrada($data_entrada)
    {
        $this->data_entrada = $data_entrada;
    }

    /**
     * @return string
     */
    public function getDataSaida()
    {
        return $this->data_saida;
    }

    /**
     * @param string $data_saida
     */
    public function setDataSaida($data_saida)
    {
        $this->data_saida = $data_saida;
    }

    /**
     * @return int
     */
    public function getNumPessoas()
    {
        return $this->num_pessoas;
    }

    /**
     * @param int $num_pessoas
     */
    public function setNumPessoas($num_pessoas)
    {
        $this->num_pessoas = $num_pessoas;
    }

    /**
     * @return int
     */
    public function getNumQuarto()
    {
        return $this->num_quartos;
    }

    /**
     * @param int $num_quartos
     */
    public function setNumQuarto($num_quartos)
    {
        $this->num_quartos = $num_quartos;
    }


}
