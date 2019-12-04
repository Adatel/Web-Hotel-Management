<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quartos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quarto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quarto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'num_quarto',
            'designacao_tipo',
            'estado',
            'preco_noite',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
