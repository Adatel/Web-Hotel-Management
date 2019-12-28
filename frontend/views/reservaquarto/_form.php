<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReservaQuarto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-quarto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_reserva')->textInput() ?>

    <?= $form->field($model, 'id_quarto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
