<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- https://demos.krajee.com/widget-details/datepicker -->
    <?= $form->field($model, 'data_entrada')->widget(DatePicker::className(), [
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'data_saida')->widget(DatePicker::className(), [
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'num_pessoas')->textInput(['type' => 'number', 'value' => 0]) ?>

    <?= $form->field($model, 'num_quartos')->textInput(['type' => 'number', 'value' => 0]) ?>

    <?= $form->field($model, 'quarto_solteiro')->textInput(['type' => 'number', 'value' => 0]) ?>

    <?= $form->field($model, 'quarto_casal')->textInput(['type' => 'number', 'value' => 0]) ?>

    <?= $form->field($model, 'quarto_duplo')->textInput(['type' => 'number', 'value' => 0]) ?>

    <?= $form->field($model, 'quarto_familia')->textInput(['type' => 'number', 'value' => 0]) ?>

    <div class="form-group">
        <?= Html::submitButton('Criar Reserva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
