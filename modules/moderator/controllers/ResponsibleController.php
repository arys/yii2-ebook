<?php

namespace app\modules\moderator\controllers;

use Yii;
use app\models\Responsible;
use app\models\ResponsibleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Levels;
use app\models\User;
    
/**
 * ResponsibleController implements the CRUD actions for Responsible model.
 */
class ResponsibleController extends Controller
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
     * Lists all Responsible models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResponsibleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Responsible model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Responsible model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Responsible();

        $kafedrasObject = Levels::find()->where(['type_id' => 2])->all();
        if($kafedrasObject != null) {
            foreach($kafedrasObject as $kafedra) $kafedras[$kafedra->id] = $kafedra->name;
        } else $kafedras = [0 => 'Нет кафедр'];
        
        $usersObject = User::find()->all();
        if($usersObject != null) {
            foreach($usersObject as $user) $users[$user->id] = $user->username;
        } else $users = [0 => 'Нет пользователей'];    

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = 1;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'kafedras' => $kafedras,
            'users' => $users,
        ]);
    }

    /**
     * Updates an existing Responsible model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $kafedrasObject = Levels::find()->where(['type_id' => 2])->all();
        if($kafedrasObject != null) {
            foreach($kafedrasObject as $kafedra) $kafedras[$kafedra->id] = $kafedra->name;
        }
        else $kafedras = [0 => 'Нет кафедр'];
        
        //$usersObject = User::find()->all();
        /*if($usersObject != null) {
            foreach($usersObject as $user) $users[$user->id] = $user->username;
        } else $users = [0 => 'Нет пользователей']; */

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'kafedras' => $kafedras,
            //'users' => $users,
        ]);
    }

    /**
     * Deletes an existing Responsible model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        $model = Responsible::find()->where(['id' => $id])->one();

        $model->rstatus = 0;


        return $this->redirect(['index']);
    }

    /**
     * Finds the Responsible model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Responsible the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Responsible::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
