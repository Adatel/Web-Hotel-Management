<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = 'Registar Funcionário';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <?= $this->render('newfuncionario', [
        'model' => $model,
    ]) ?>

</div>
