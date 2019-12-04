<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Quarto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quarto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_quarto')->textInput() ?>

    <?= $form->field($model, 'designacao_tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'preco_noite')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
