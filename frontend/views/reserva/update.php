<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */

$this->title = 'Alterar Reserva: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Alterar Reserva';
?>
<div class="reserva-update">

    <h2><?= Html::encode($this->title) ?></h2>
    <br>

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
