<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Classificacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classificacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quarto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serviços')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'geral')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
