<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_hora')->textInput() ?>

    <?= $form->field($model, 'custo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_reservaquarto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Registar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
