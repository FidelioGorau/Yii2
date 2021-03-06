<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
