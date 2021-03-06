<?php

namespace app\controllers;

use Yii;
use app\models\Students;
use app\models\StudentLesson;
use app\models\Lessons;
use app\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider; 
use yii\web\Request;
/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex($school_id)
    {
        $searchModel = new StudentsSearch(); 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$school_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       $lessons = new ArrayDataProvider([
                        'allModels' => $this->findModel($id)->lessons,
                        'sort' => [
                            'attributes' => ['id', 'school_id', 'name','class_id'],
                        ],
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                    ]);
        $student = $this->findModel($id);        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'lessons' => $lessons
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($school_id)
    {
        $model = new Students();
        $model->school_id = $school_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionAddlesson($id,$school_id)
    {
        $model = new StudentLesson();
        var_dump($model->find()->where(['student_id'=>$id])->all());
        $lessons = new Lessons();
        $lessonsList = $lessons->find()->where(['school_id' => $school_id])->all();
        $lessArray = [];
        foreach($lessonsList as $lesson){
            $lessArray[$lesson['id']]= $lesson['name'];
        }
        if ($model->load(Yii::$app->request->post())) {
           $model->student_id= $id;
           if($model->save()){
                return $this->redirect(['students/view', 'id' => $id]);
           }
        } else {
            return $this->render('addlessons', [
                'model' => $model,
                'lessArray' => $lessArray,
            ]);
        }
    }
    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
