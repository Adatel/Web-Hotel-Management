<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quarto */

$this->title = 'Update Quarto: ' . $model->num_quarto;
$this->params['breadcrumbs'][] = ['label' => 'Quartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->num_quarto, 'url' => ['view', 'id' => $model->num_quarto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quarto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
