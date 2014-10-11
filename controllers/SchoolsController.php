<?php

namespace app\controllers;

use Yii;
use app\models\Schools;
use app\models\SchoolsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class SchoolsController extends Controller
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
     * Lists all Schools models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schools model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {//var_dump($this->findModel($id)->students);
       $students = new ArrayDataProvider([
                        'allModels' => $this->findModel($id)->students,
                        'sort' => [
                            'attributes' => ['id', 'name','school_id'],
                        ],
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                    ]);
       $teachers = new ArrayDataProvider([
                        'allModels' => $this->findModel($id)->teachers,
                        'sort' => [
                            'attributes' => ['id', 'name','school_id'],
                        ],
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                    ]);
       $lessons = new ArrayDataProvider([
                        'allModels' => $this->findModel($id)->lessons,
                        'sort' => [
                            'attributes' => ['id', 'name','school_id'],
                        ],
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                    ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'students' => $students,
            'teachers' => $teachers,
            'lessons' => $lessons       
        ]);
    }

    /**
     * Creates a new Schools model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Schools();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Schools model.
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
     * Deletes an existing Schools model.
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
     * Finds the Schools model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schools the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schools::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
