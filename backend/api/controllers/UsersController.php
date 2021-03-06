<?php

namespace backend\api\controllers;

use backend\models\Pedido;
use common\models\Reserva;
use common\models\ReservaQuarto;
use Yii;
use frontend\models\SignupForm;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\Console;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use common\models\User;


class UsersController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];

        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);

        if ($user && $user->validatePassword($password))
        {
            return $user;
        } return null;
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    public function actionIndex(){

        $user = Yii::$app->user->identity;

        $utilizador = User::find()
            ->where(['id' => $user->getId()])
            ->one();

        return $utilizador;
    }
/*
    public function actionSignup(){

        $model = new SignupForm();
        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->email = $params['email'];
        $model->password = $params['password'];

        $model->nome = $params['nome'];
        $model->nif = $params['nif'];
        $model->telemovel = $params['telemovel'];
        $model->morada = $params['morada'];

        if($model->signup()){
            $response['isSuccess'] = 201;
            $response['message'] = "Cliente registado com sucesso!";
            $response['user'] =\common\models\User::findByUsername($model->username);
            return $response;
        } else {
            $model->getErrors();
            $response['hasErrors'] = $model->hasErrors();
            $response['errors'] = $model->getErrors();
            return $response;
        }
    }
*/
    public function  actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }

    public function actionReservas($id){

        $user = User::find()
            ->where(['id' => $id])
            ->one();

        $reservas = Reserva::find()
            ->where(['id_cliente' => $user->id])
            ->asArray()
            ->all();

        return $reservas;
    }

    public function actionPedidos($id){

        $allpedidos = [];

        $user = User::find()
            ->where(['id' => $id])
            ->one();

        $reservas = Reserva::find()
            ->where(['id_cliente' => $user->id])
            ->asArray()
            ->all();

        foreach ($reservas as $reserva) {
            $reservaquartos = ReservaQuarto::find()
                ->where(['id_reserva' => $reserva->id])
                ->asArray()
                ->all();

            foreach ($reservaquartos as $reservaquarto) {
                $pedidos = Pedido::find()
                    ->where(['id_reserva' => $reserva->id])
                    ->asArray()
                    ->all();

                $allpedidos += $pedidos;
            }
        }
        return $allpedidos;
    }
}
