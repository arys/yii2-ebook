<?php

namespace app\modules\moderator\controllers;

use Yii;
use app\models\Levels;
use app\models\LevelsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LevelsController implements the CRUD actions for Levels model.
 */
class LevelsController extends Controller
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
     * Lists all Levels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LevelsSearch($tid);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
