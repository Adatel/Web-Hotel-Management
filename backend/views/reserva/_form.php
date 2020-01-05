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

    <?= $form->field($model, 'quarto_solteiro')->textInput() ?>

    <?= $form->field($model, 'quarto_duplo')->textInput() ?>

    <?= $form->field($model, 'quarto_familia')->textInput() ?>

    <?= $form->field($model, 'quarto_casal')->textInput() ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
