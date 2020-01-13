<?php

namespace backend\controllers;

use backend\models\SignupForm;
use Yii;
use common\models\Profile;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['cliente', 'funcionario', 'view', 'create', 'update', 'delete'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['cliente', 'funcionario', 'view', 'createcliente', 'createfuncionario', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionFuncionario()
    {
        $i = 1;

        $dataProvider = new ActiveDataProvider([
            'query' => Profile::find()
                ->where(['is_funcionario' => $i]),
        ]);

        return $this->render('funcionario', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCliente()
    {
        $i = 1;

        $dataProvider = new ActiveDataProvider([
            'query' => Profile::find()->where(['is_cliente' => $i]),
        ]);

        return $this->render('cliente', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatecliente()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signupCliente()) {
            return $this->redirect(['view', 'id' => $model->nif]);
        }

        return $this->render('createcliente', [
            'model' => $model,
        ]);
    }

    public function actionCreatefuncionario()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signupFuncionario()) {
            return $this->redirect(['view', 'id' => $model->nif]);
        }

        return $this->render('createfuncionario', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nif]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Obrigado pelo seu registo. Por favor, faça a verificação do seu email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
