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

    <?php echo $form->field($model, 'num_quartos')->textInput(),
    $form->field($model, 'tipo_quarto[]')->dropDownList(['1' => 'Quarto de Solteiro', '2' => 'Quarto Duplo', '3' => 'Quarto de Família', '4' => 'Quarto de Casal'])
   // Html::buttonInput('+', ['class' => 'btn btn-success', 'name' => 'submit', 'value' => '+']);

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
