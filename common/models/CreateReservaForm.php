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

    public $tipo1 = 0, $tipo2 = 0, $tipo3 = 0, $tipo4 = 0;


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
        $reserva->quarto_casal = $this->quarto_casal;
        $reserva->quarto_duplo = $this->quarto_duplo;
        $reserva->quarto_familia = $this->quarto_familia;
        $reserva->id_cliente = $user;

        $count = $this->quarto_solteiro + $this->quarto_duplo + $this->quarto_familia + $this->quarto_casal;

        if ($count != $this->num_quartos){
            echo '<script type="text/javascript">';
            echo ' alert("O número de quartos nao coincide com os quartos que selecionou!")';
            echo '</script>';
        } else {

            $this->tipo1 = Quarto::find()
                ->where(['estado' => 0, 'id_tipo' => 1])->count();
            $this->tipo2 = Quarto::find()
                ->where(['estado' => 0, 'id_tipo' => 2])->count();
            $this->tipo3 = Quarto::find()
                ->where(['estado' => 0, 'id_tipo' => 3])->count();
            $this->tipo4 = Quarto::find()
                ->where(['estado' => 0, 'id_tipo' => 4])->count();

            var_dump($this->tipo1);
            var_dump($this->tipo2);
            var_dump($this->tipo3);
            var_dump($this->tipo4);
            die();
            $this->tipo1 = 0;
            $this->tipo2 = 0;
            $this->tipo3 = 0;
            $this->tipo4 = 0;
            var_dump($this->tipo1);
            die();

            $reserva->save();

            $reserva_quarto = new ReservaQuarto();
            $reserva_quarto->id_reserva = $reserva->id;
            $reserva_quarto->tipo_quarto = "Quarto Solteiro";//$this->tipo_quarto;
            $reserva_quarto->id_quarto = 1;
            $reserva_quarto->save();
        }
    }

}