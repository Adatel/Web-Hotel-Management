<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sobre o Hotel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <section class="intro-section spad">
        <div class="container">
            <div class="row intro-text">
                <div class="col-lg-6">
                    <div class="intro-left">
                        <div class="section-title">
                            <h2>Informações do <br>Hotel</h2>
                        </div>
                        <p>O hotel fornece uma estadia excelente, com inúmeros quartos, serviços de quarto de topo, e refeições classificadas como 5 estrelas.
                            Construido em 1890 e comprado por uma empresa inovadora, o hotel Adatel oferece uma das melhores experências do mercado.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="intro-right">
                        <h6>Foto atual do hotel</h6>
                        <?php echo Html::img('@web/images/fotoHotel.jpg', array('width' => 500, 'height' => 400)) ?>
                    </div>
                </div>
                </div>
            </div>
    </section>
</div>
