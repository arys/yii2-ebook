<?php

namespace app\modules\moderator\controllers;

use Yii;
use app\models\Document;
use app\models\DocumentSearch;
use app\models\Plan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocumentController implements the CRUD actions for Document model.
 */
class DocumentController extends Controller
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
     * Lists all Document models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (isset($_GET['planid']) || isset($_GET['kafid'])) {
            if (isset($_GET['planid'])) {
                $planid = (int)$_GET['planid'];
                $plan = Plan::find()->where('id = :id', [':id' => $planid])->one();
                $date_start = date("d.m.Y", strtotime($plan['date_start']));
                $date_end = date("d.m.Y", strtotime($plan['date_end']));
                $searchModel = new DocumentSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'plan' => $plan,
                    'date_start' => $date_start,
                    'date_end' => $date_end,
                ]);
            }
            else {
                $kafid = (int)$_GET['kafid'];
                $plan = Plan::find()->where('kafedra_id = :kafedra_id', [':kafedra_id' => $kafid])->one();
                $_GET['planid'] = (int)$plan['id'];
                $date_start = date("d.m.Y", strtotime($plan['date_start']));
                $date_end = date("d.m.Y", strtotime($plan['date_end']));
                $searchModel = new DocumentSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'plan' => $plan,
                    'date_start' => $date_start,
                    'date_end' => $date_end,
                ]);
            }
        }
        else {
            $searchModel = new DocumentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionReviewerSet($id)
    {
        //var_dump($id);
        $model = $this->findModel($id);


        return $this->render('reviewer_set', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
