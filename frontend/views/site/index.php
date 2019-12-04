<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Adatel';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem - Vindo!</h1>

        <p class="lead">Ainda não fez reserva? Faça-a já!</p>

        <p>
            <?php
                echo Html::a('Criar Reserva', ['/reserva/create'], ['class'=>'btn btn-success grid-button'])
            ?>
        </p>
    </div>


</div>
