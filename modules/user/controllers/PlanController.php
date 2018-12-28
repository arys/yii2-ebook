<?php

namespace app\modules\user\controllers;

use Yii;
use app\models\Plan;
use app\models\PlanSearch;
use app\models\Levels;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends Controller
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
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndex()
    {
        //var_dump(Yii::$app->User);
        //Yii::$app->user->logout($identity, 3600); //разлогинивание произвольного пользователя

        //$identity = new \app\models\Author();
        //Yii::$app->user->login($identity, 3600); // залогинивание произвольного пользователя

        //Yii::$app->user->identity;
        $searchModel = new PlanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //var_dump($model->kafedra_id);
        $kafedra = Levels::find()->where(['id' => $model->kafedra_id])->one();
        //var_dump($kafedra->name);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'kafedra' => $kafedra->name,
        ]);
    }

    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plan();
        $kafedra = Levels::find()->where(['type_id' => 2])
            ->orderBy('name ASC')
            ->all();
        if ($model->load(Yii::$app->request->post())) {
            $datestart = date("Y-m-d", strtotime($_POST['Plan']['date_start']));
            $dateend = date("Y-m-d", strtotime($_POST['Plan']['date_end']));
            $model->date_start = $datestart;
            $model->date_end = $dateend;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'kafedra' => $kafedra,
        ]);
    }

    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $kafedra = Levels::find()->where(['type_id' => 2])
            ->orderBy('name ASC')
            ->all();
        $model->date_start = date("d.m.Y", strtotime($model->date_start));
        $model->date_end = date("d.m.Y", strtotime($model->date_end));
        if ($model->load(Yii::$app->request->post())) {
            $datestart = date("Y-m-d", strtotime($_POST['Plan']['date_start']));
            $dateend = date("Y-m-d", strtotime($_POST['Plan']['date_end']));
            $model->date_start = $datestart;
            $model->date_end = $dateend;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        //var_dump($id);
        return $this->render('update', [
            'model' => $model,
            'kafedra' => $kafedra,
        ]);

    }

    /**
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = Plan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
