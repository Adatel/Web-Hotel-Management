<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */

$this->title = 'Criar Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
