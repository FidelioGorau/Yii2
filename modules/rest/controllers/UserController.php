<?php

namespace app\modules\rest\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;

class UserController extends ActiveController
{
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['update'], $actions['delete']);
        return $actions;
    }
    public $modelClass = 'app\models\User';
}