<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Classificacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classificacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Classificacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'quarto',
            'comida',
            'staff',
            'serviços',
            //'geral',
            //'id_cliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
