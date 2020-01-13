<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quarto */

$this->title = 'Registar Quarto';
$this->params['breadcrumbs'][] = ['label' => 'Quartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quarto-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
