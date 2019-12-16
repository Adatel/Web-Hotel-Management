<?php

namespace backend\api\controllers;

use Yii;
use frontend\models\SignupForm;
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

        /*$model->is_admin = 0;
        $model->is_funcionario = 0;
        $model->is_cliente = 1;*/

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

    public function  actionTotal(){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }
}
