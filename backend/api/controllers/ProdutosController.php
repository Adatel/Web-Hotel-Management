<?php
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 20/01/2020
 * Time: 03:00
 */

namespace backend\api\controllers;


use yii\rest\ActiveController;

class ProdutosController extends ActiveController
{
    public $modelClass = 'backend\models\Produto';
}