<?php

namespace backend\api\controllers;

use common\models\Reserva;
use common\models\ReservaQuarto;
use common\models\User;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class ReservasController extends ActiveController
{
    public $modelClass = 'common\models\Reserva';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' =>  [$this, 'auth'],
                ],
                QueryParamAuth::className(),
            ],
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user;
        }
        return null;
    }

    public function  actionTotal(){
        $reservamodel = new $this->modelClass;
        $recs = $reservamodel::find()->all();
        return ['total' => count($recs)];
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    // Método que devolve as reservas do cliente após a autenticação
    public function actionIndex(){

        $user = Yii::$app->user->identity;

        $reservas = Reserva::find()
                        ->where(['id_cliente' => $user->getId()])
                        ->asArray()
                        ->all();

        return $reservas;
    }

    // Método que devolve os quartos reservados da reserva
    public function actionReservaquartos($id){

        $reserva = Reserva::find()->where(['id' => $id])->one();

        $reservaQuartos = ReservaQuarto::find()
            ->where(['id_reserva' => $reserva->id])
            ->asArray()
            ->all();

        return $reservaQuartos;
    }

}
