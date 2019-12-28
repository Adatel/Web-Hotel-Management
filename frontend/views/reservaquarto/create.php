<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReservaQuarto */

$this->title = 'Create Reserva Quarto';
$this->params['breadcrumbs'][] = ['label' => 'Reserva Quartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-quarto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
