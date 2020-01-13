<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registar Funcionário', ['createfuncionario'], ['class' => 'btn btn-info']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'nome',
            'nif',
            'telemovel',
            'morada',
            //'is_admin',
            //'is_funcionario',
            //'is_cliente',
            //'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
