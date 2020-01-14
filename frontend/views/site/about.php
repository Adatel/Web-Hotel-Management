<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Informações do Hotel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">


    <section class="intro-section spad">
        <div class="container">
            <div class="row intro-text">
                <div class="col-lg-6">
                    <div class="intro-left">
                        <div class="section-title">
                            <h1><?= Html::encode($this->title) ?></h1>
                        </div>
                        <br><br>
                        <p>O hotel fornece uma estadia excelente, com inúmeros quartos, serviços de quarto de topo, e refeições classificadas como 5 estrelas.
                            Construido em 1890 e comprado por uma empresa inovadora, o hotel Adatel oferece uma das melhores experências do mercado.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="intro-right">
                        <?php echo Html::img('@web/images/fotoHotel.jpg', array('width' => 500, 'height' => 400)) ?>
                        <h6>Foto atual do hotel</h6>
                    </div>
                </div>
                </div>
            </div>
    </section>
</div>
