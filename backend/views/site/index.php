<?php

/* @var $this yii\web\View */
/* @var $quartosLivres \frontend\controllers\SiteController */
/* @var $numeroQuartosOcupados \frontend\controllers\SiteController */
/* @var $numeroQuartosLivres \frontend\controllers\SiteController */

$this->title ="Adatel";

use Carbon\Carbon;
use common\models\Reserva;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Adatel</h1>
    </div>

    <div class="body-content">
        <table style="width:100%" id="tabela">
            <tr>
                <th>Quartos Livres:
                    <?=
                        $numeroQuartosLivres;
                    ?>
                </th>
                <th>
                    <?php/*
                        foreach ($quartosLivres as $quartoLivre){

                            $quarto = implode($quartoLivre);

                            echo $quarto;
                        }
                   */?>
                </th>
                <th>Quartos Ocupados:
                    <?=
                        $numeroQuartosOcupados
                    ?>
                </th>
                <th>Reservas Ativas:
                    <?=
                    Reserva::find()
                    ->where(['data_saida' => Carbon::now()])->count();
                    ?>
                </th>
            </tr>
        </table>

       <!-- <table style="width:100%">
            <th>Quartos Ocupados</th>
        </table>

        <table style="width:100%">
            <th>Reservas Ativas</th>
        </table>-->
    </div>
</div>
