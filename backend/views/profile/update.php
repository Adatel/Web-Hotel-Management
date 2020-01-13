<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = 'Atualizar Utilizador: ' . $model->nif;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nif, 'url' => ['view', 'id' => $model->nif]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">

    <h2><?= Html::encode($this->title) ?></h2>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
