<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_unitario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model , 'id_tipo')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\TipoProduto::find()->all(), 'id', 'descricao_tipo'),['class' => 'form-control inline-block']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info', 'name' => 'save-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
