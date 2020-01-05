<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registar Utilizador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h2><?= Html::encode($this->title) ?></h2>

    <br>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'nif') ?>

                <?= $form->field($model, 'telemovel') ?>

                <?= $form->field($model, 'morada') ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'is_funcionario')->checkbox(['label' => 'Funcionário', 'uncheck' => 0, 'value' => 1]) ?>

                <?= $form->field($model, 'is_cliente')->checkbox(['label' => 'Cliente', 'uncheck' => 0, 'value' => 1]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Registar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
