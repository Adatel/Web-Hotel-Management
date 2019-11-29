<?php
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 29/11/2019
 * Time: 14:19
 */

namespace common\models;


use Yii;
use yii\base\Model;

class CreateReservaForm extends Model {

    public $data_entrada;
    public $data_saida;
    public $num_pessoas;
    public $num_quartos;
    public $quarto_solteiro;
    public $quarto_duplo;
    public $quarto_familia;
    public $quarto_casal;
    public $tipo_quarto;


    public function rules()
    {
        return [
            [['data_entrada', 'data_saida', 'num_pessoas', 'num_quartos', 'id_cliente'], 'required'],
            [['data_entrada', 'data_saida'], 'safe'],
            [['num_pessoas', 'num_quartos', 'quarto_solteiro', 'quarto_duplo', 'quarto_familia', 'quarto_casal', 'id_cliente'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_cliente' => 'id_user']],

            [['tipo_quarto', 'id_quarto'], 'required'],
            [['id_reserva'], 'integer'],
            [['tipo_quarto'], 'string', 'max' => 50],
        ];
    }

    public function reserva(){

        $user = Yii::$app->user->id;
        //var_dump($user);

        $reserva = new Reserva();
        $reserva->data_entrada = $this->data_entrada;
        $reserva->data_saida = $this->data_saida;
        $reserva->num_pessoas = $this->num_pessoas;
        $reserva->num_quartos = $this->num_quartos;
        $reserva->quarto_solteiro = $this->quarto_solteiro;
        $reserva->quarto_duplo = $this->quarto_duplo;
        $reserva->quarto_familia = $this->quarto_familia;
        $reserva->quarto_casal = $this->quarto_casal;
        $reserva->id_cliente = $user;
        $reserva->save();

        $reserva_quarto = new ReservaQuarto();
        $reserva_quarto->id_reserva = $reserva->id;
        $reserva_quarto->tipo_quarto = $this->tipo_quarto;
        $reserva_quarto->save();

    }

}