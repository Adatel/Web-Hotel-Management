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

    <?= $form->field($model, 'num_pessoas')->textInput() ?>

    <?= $form->field($model, 'num_quartos')->textInput(['type' => 'number','class' => 'col-md-5']) ?>

    <?= $form->field($model, 'tipo_quarto')->textInput(['maxlength' => true, 'class' => 'col-md-6']) ?>
    <?= Html::buttonInput('+', ['class' => 'btn btn-success col-md-1', 'name' => 'submit', 'value' => '+']); ?>


  <?php  /*echo $form->field($model, 'num_quartos')->textInput(),
    $form->field($model, 'tipo_quarto[]')->dropDownList(['a' => 'Quarto de Solteiro', 'b' => 'Quarto Duplo', 'c' => 'Quarto de Família', 'd' => 'Quarto de Casal']),
    Html::buttonInput('+', ['class' => 'btn btn-success', 'name' => 'submit', 'value' => '+']);
*/
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
