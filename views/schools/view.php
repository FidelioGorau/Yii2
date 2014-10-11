<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Button;
/* @var $this yii\web\View */
/* @var $model app\models\Schools */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schools-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<h3><a href="<?=Yii::$app->urlManager->createUrl(['students','school_id' => $model->id ]);?>">Students list:</a></h3>
    <?= GridView::widget([
        'dataProvider' => $students,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name'
        ],
    ]); ?> 
<?= Html::a('Add student', ['students/create', 'school_id' => $model->id], ['class' => 'btn btn-success']) ?>
<h3><a href="<?=Yii::$app->urlManager->createUrl(['lessons','school_id' => $model->id ]);?>">Lessons list:</a></h3>
    <?= GridView::widget([
        'dataProvider' => $lessons,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'school_id',
            'name',
        ],
    ]); ?>
    <?= Html::a('Add lesson', ['lessons/create', 'school_id' => $model->id], ['class' => 'btn btn-success']) ?>
<h3><a href="<?=Yii::$app->urlManager->createUrl(['teachers','school_id' => $model->id ]);?>">Teachers list:</a></h3>
    <?= GridView::widget([
        'dataProvider' => $teachers,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'school_id',
            'name',
        ],
    ]); ?>
    <?= Html::a('Add teacher', ['teachers/create', 'school_id' => $model->id], ['class' => 'btn btn-success']) ?>
</div>
