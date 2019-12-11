<?php

namespace backend\api\controllers;

use yii\rest\ActiveController;

class UsersController extends ActiveController
{
    public $modelClass = 'common\models\User';
}
