<?php
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 29/11/2019
 * Time: 14:19
 */

namespace common\models;


use backend\models\Quarto;
use Carbon\Carbon;
use Yii;
use yii\base\Model;
use yii\web\View;

class ReservaForm extends Model
{

    public $data_entrada;
    public $data_saida;
    public $num_pessoas;
    public $num_quartos;
    public $quarto_solteiro;
    public $quarto_duplo;
    public $quarto_familia;
    public $quarto_casal;
    public $nif;

    public $tipo1 = 0, $tipo2 = 0, $tipo3 = 0, $tipo4 = 0;


    public function rules()
    {
        return [
            [['data_entrada', 'data_saida', 'num_pessoas', 'num_quartos', 'id_cliente', 'nif'], 'required'],
            [['data_entrada', 'data_saida'], 'safe'],
            [['num_pessoas', 'num_quartos', 'quarto_solteiro', 'quarto_duplo', 'quarto_familia', 'quarto_casal', 'id_cliente'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_cliente' => 'id_user']],

            [['id_quarto'], 'required'],
            [['id_reserva'], 'integer'],
        ];
    }

    public function criarReserva()
    {
        $user = Profile::find()->where(['nif' => $this->nif])->one();
        //var_dump($user->id_user);
        //die();

        $reserva = new Reserva();
        $reserva->data_entrada = $this->data_entrada;
        $reserva->data_saida = $this->data_saida;
        $reserva->num_pessoas = $this->num_pessoas;
        $reserva->quarto_solteiro = $this->quarto_solteiro;
        $reserva->quarto_casal = $this->quarto_casal;
        $reserva->quarto_duplo = $this->quarto_duplo;
        $reserva->quarto_familia = $this->quarto_familia;
        $count = $this->quarto_solteiro + $this->quarto_duplo + $this->quarto_familia + $this->quarto_casal;
        $reserva->num_quartos = $count;
        $reserva->id_cliente = $user->id_user;

        $this->tipo1 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 1])->count();
        $this->tipo2 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 2])->count();
        $this->tipo3 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 3])->count();
        $this->tipo4 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 4])->count();


        if ($this->data_entrada < $this->data_saida) {
            if ($count < 1) {
                Yii::$app->session->setFlash('error', 'Insira pelo menos 1 quarto!');
            } else {
                if ($this->tipo1 >= $this->quarto_solteiro && $this->tipo2 >= $this->quarto_casal && $this->tipo3 >= $this->quarto_duplo && $this->tipo4 >= $this->quarto_familia) {
                    $reserva->save();

                    for ($i = 1; $i <= $this->quarto_solteiro; $i++) {
                        $quarto = Quarto::find()
                            ->where(['id_tipo' => 1, 'estado' => 0])
                            ->one();
                        $reserva_quarto = new ReservaQuarto();
                        $reserva_quarto->id_reserva = $reserva->id;
                        $reserva_quarto->id_quarto = $quarto->num_quarto;
                        $quarto->estado = 1;
                        $quarto->save();
                        $reserva_quarto->save();
                    }

                    for ($j = 1; $j <= $this->quarto_casal; $j++) {
                        $quarto2 = Quarto::find()
                            ->where(['id_tipo' => 2, 'estado' => 0])
                            ->one();
                        $reserva_quarto = new ReservaQuarto();
                        $reserva_quarto->id_reserva = $reserva->id;
                        $reserva_quarto->id_quarto = $quarto2->num_quarto;
                        $quarto2->estado = 1;
                        $quarto2->save();
                        $reserva_quarto->save();
                    }

                    for ($k = 1; $k <= $this->quarto_duplo; $k++) {
                        $quarto3 = Quarto::find()
                            ->where(['id_tipo' => 3, 'estado' => 0])
                            ->one();
                        $reserva_quarto = new ReservaQuarto();
                        $reserva_quarto->id_reserva = $reserva->id;
                        $reserva_quarto->id_quarto = $quarto3->num_quarto;
                        $quarto3->estado = 1;
                        $quarto3->save();
                        $reserva_quarto->save();
                    }

                    for ($l = 1; $l <= $this->quarto_familia; $l++) {
                        $quarto4 = Quarto::find()
                            ->where(['id_tipo' => 4, 'estado' => 0])
                            ->one();
                        $reserva_quarto = new ReservaQuarto();
                        $reserva_quarto->id_reserva = $reserva->id;
                        $reserva_quarto->id_quarto = $quarto4->num_quarto;
                        $quarto4->estado = 1;
                        $quarto4->save();
                        $reserva_quarto->save();
                    }

                    Yii::$app->session->setFlash('success', 'A Reserva foi criada com sucesso!!');
                } else {
                    Yii::$app->session->setFlash('error', 'Não foi possível fazer reserva, devido à falta de quartos disponiveis!');
                }
            }
        } else {
            Yii::$app->session->setFlash('error', 'Verifique as datas de reserva. Só é possivel fazer reserva até 2 dias de antecedência!');
        }
    }

    /*
    public function alterarReserva($model){

        var_dump($model);
        die();

        $count = $this->quarto_solteiro + $this->quarto_duplo + $this->quarto_familia + $this->quarto_casal;

        $this->tipo1 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 1])->count();
        $this->tipo2 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 2])->count();
        $this->tipo3 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 3])->count();
        $this->tipo4 = Quarto::find()
            ->where(['estado' => 0, 'id_tipo' => 4])->count();

        // Verifica se as datas são aceitáveis
        if($this->data_entrada < $this->data_saida){

            // Verifica se o cliente está a reservar pelo menos 1 quarto
            if ($count < 1) {
                Yii::$app->session->setFlash('error', 'Insira pelo menos 1 quarto!');
            } else {

                // Verifica se existe quartos livres correspondentes ao que o cliente pede
                if ($this->tipo1 >= $this->quarto_solteiro && $this->tipo2 >= $this->quarto_casal && $this->tipo3 >= $this->quarto_duplo && $this->tipo4 >= $this->quarto_familia) {



                    Yii::$app->session->setFlash('success', 'A Reserva foi alterada com sucesso!!');
                } else {
                    Yii::$app->session->setFlash('error', 'Não foi possível fazer reserva, devido à falta de quartos disponiveis!');
                }

            }

        } else {
            Yii::$app->session->setFlash('error', 'Verifique as datas de reserva. Só é possivel fazer reserva até 2 dias de antecedência!');
        }
    }
    */
}

