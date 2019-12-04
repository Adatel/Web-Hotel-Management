<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'data_entrada',
            'data_saida',
            'num_pessoas',
            'num_quartos',
            //'quarto_solteiro',
            //'quarto_duplo',
            //'quarto_familia',
            //'quarto_casal',
            //'id_cliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
