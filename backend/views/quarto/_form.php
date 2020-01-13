<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quarto */
/* @var $form yii\widgets\ActiveForm */

/* <?=  $form->field($model, 'id_tipo')->textInput() ?> */
?>

<div class="quarto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_quarto')->textInput() ?>

    <?= $form->field($model , 'id_tipo')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Quarto::find()->all(), 'id_tipo', 'tipo.designacao'),['class' => 'form-control inline-block']) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
