<?php

namespace app\modules\rest\controllers;

use yii\rest\ActiveController;

class StudentController extends ActiveController
{
    public $modelClass = 'app\models\Students';
}