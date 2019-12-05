<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Adatel';
?>
<div class="site-index">
    <div class='container'></div>
    <div class="jumbotron">
        <h1>Bem - Vindo!</h1>

        <p class="lead">Ainda não fez reserva? Faça-a já!</p>

        <p>
            <?php
                echo Html::a('Criar Reserva', ['/reserva/create'], ['class'=>'btn btn-info grid-button'])
            ?>
        </p>

        <div id="slideshow">
            <div>
                <img src="web/images/background1.jpg">
            </div>
            <div>
                <img src="web/images/background2.jpg">
            </div>
            <div>
                <img src="web/images/background3.jpg">
            </div>
            <div>
                <img src="web/images/background5.jpg">
            </div>
        </div>
    </div>
</div>
