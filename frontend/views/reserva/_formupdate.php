<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_entrada')->textInput() ?>

    <?= $form->field($model, 'data_saida')->textInput() ?>

    <?= $form->field($model, 'num_pessoas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Alterar Reserva', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
