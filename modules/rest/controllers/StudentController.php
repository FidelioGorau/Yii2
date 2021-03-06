<?php

namespace app\modules\rest\controllers;

use yii\rest\ActiveController;

class StudentController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className()
        ];
        return $behaviors;
    }
    public $modelClass = 'app\models\Students';
}