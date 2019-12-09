<?php

/* @var $this yii\web\View */

use yii\bootstrap\Carousel;
use yii\helpers\Html;
$this->title = 'Adatel';
?>
<div class="site-index">
    <div class='container'></div>
    <div class="jumbotron">
        <h1>Bem - Vindo!</h1>

        <p>
            <?php
                if(Yii::$app->user->isGuest) {
                   /// echo Html::a('Criar Reserva', ['/site/index'], ['class' => 'btn btn-info grid-button']);
                } else {
                    echo '<p class="lead">Ainda não fez reserva? Faça-a já!</p>';
                    echo Html::a('Criar Reserva', ['/reserva/create'], ['class' => 'btn btn-info grid-button']);
                }
            ?>
        </p>
        <br>
        <br>
        <br>

        <?php

        $url_images = yii\helpers\Url::to('@web/images/');

        echo Carousel::widget(['items' =>
            [['content' => '<img src="' . $url_images . '/background1.jpg"/>',
                'options' => ['style' => 'width: 100%; height: 550px;']],
                ['content' => '<img src="' .  $url_images . '/background2.jpg"/>',
                    'options' => ['style' => 'width: 100%; height: 550px;']],
                ['content' => '<img src="' .  $url_images . '/background3.jpg"/>',
                    'options' => ['style' => 'width: 100%; height: 550px;']],
                ['content' => '<img src="' .  $url_images . '/background4.jpg"/>',
                    'options' => ['style' => 'width: 100%; height: 550px;']],
                ['content' => '<img src="' .  $url_images . '/background5.jpg"/>',
                    'options' => ['style' => 'width: 100%; height: 550px;']]],
          ]);

        ?>
    </div>
</div>
