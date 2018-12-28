<?php

namespace app\modules\moderator\controllers;

use Yii;
use app\models\Levels;
use app\models\LevelsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * KafedraController implements the CRUD actions for Kafedra model.
 */
class LevelskafController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kafedra models.
     * @return mixed
     */
    public function actionIndex($tid)
    {
        //var_dump($tid);
        //var_dump($tid);
        $searchModel = new LevelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSelectKaf($tid)
    {
            if(Yii::$app->request->isAjax){
                if($tid!="")
                    return $this->redirect(['index', 'tid' => $tid]);
            }
    }

    /**
     * Displays a single Kafedra model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionView($id)
    {
        if(Yii::$app->request->isAjax){
            if($id!="")
                return $this->redirect(['view', 'id' => $id]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Kafedra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Levels();

        $facultiesObject = Levels::find()->where(['type_id' => 1])->all();
        if($facultiesObject != null) {
            foreach($facultiesObject as $faculty) $faculties[$faculty->id] = $faculty->name;
        } else $faculties = [0 => 'Нет Факультетов'];
        
        if ($model->load(Yii::$app->request->post())) {
            $model->type_id = 2;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'     => $model,
            'faculties' => $faculties,
        ]);
    }*/

    /**
     * Updates an existing Kafedra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $facultiesObject = Levels::find()->where(['type_id' => 1])->all();
        if($facultiesObject != null) {
            foreach($facultiesObject as $faculty) $faculties[$faculty->id] = $faculty->name;
        } else $faculties = [0 => 'Нет Факультетов'];

        if ($model->load(Yii::$app->request->post())) {
            $model->type_id = 2;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'faculties' => $faculties,
        ]);
    }*/

    /**
     * Deletes an existing Kafedra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Kafedra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Levels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Levels::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
