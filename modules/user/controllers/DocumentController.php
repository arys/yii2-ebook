<?php

namespace app\modules\user\controllers;

use Yii;
use app\models\Document;
use app\models\DocumentSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Type;
use app\models\Language;
use app\models\Discipline;
use app\models\Specialty;
use app\models\Plan;
use app\models\Author;
use app\models\FileUpload;
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
        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //var_dump($dataProvider);
        //var_dump($searchModel);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Document model.
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
     * Creates a new Document model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($plan_id)
    {
        $model = new Document();
        
        $plan = Plan::find()->where(['id' => $plan_id])->all();
        
        $dropdownData = [
            'types' => $this->getDataForDropdownList(Type::find()->all()),
            'languages' => $this->getDataForDropdownList(Language::find()->all()),
            'specialties' => $this->getDataForDropdownList(Specialty::find()->all()),
            'disciplines' => $this->getDataForDropdownList(Discipline::find()->all()),
        ];
        
        if ($model->load(Yii::$app->request->post())) {
            
            //todo убрать в будущем
            $model->responsible_id = "2";
            $model->reviewer_id = "1";
            //
            
            $model->token = md5(uniqid(rand(), true));
            $model->status = "1";
            $model->plan_id = $plan_id;
            
            if($model->save()) return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dropdownData' => $dropdownData,
            'plan' => $plan[0]
        ]);
    }

    function getDataForDropdownList($dataObject, $isEmptyText="Нет") {
        if($dataObject != null) {
            foreach($dataObject as $data) $datas[$data->id] = $data->name;
        } else $datas = array($isEmptyText);
        return $datas;
    }
    
    /**
     * Updates an existing Document model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dropdownData = [
            'types' => $this->getDataForDropdownList(Type::find()->all()),
            'languages' => $this->getDataForDropdownList(Language::find()->all()),
            'specialties' => $this->getDataForDropdownList(Specialty::find()->all()),
            'disciplines' => $this->getDataForDropdownList(Discipline::find()->all()),
        ];
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dropdownData' => $dropdownData
        ]);
    }

    /**
     * Deletes an existing Document model.
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
     * Finds the Document model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Document the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionEbook($id)
    {
        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //var_dump($dataProvider);
        //var_dump($searchModel);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAttachFile($id) {
        $model = new FileUpload;

        if(Yii::$app->request->isPost) {
            $document = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'file');

            if($document->saveFile($model->uploadFile($file, $document->path))) {
                return $this->redirect(['view', 'id' => $document->id]);
            }
        }

        return $this->render('file', ['model' => $model]);
    }

    public function actionAddAuthors($id) {
        $document = $this->findModel($id);
        $selectedAuthors = $document->getSelectedAuthors();
        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'name');

        if(Yii::$app->request->isPost) {
            $authors = Yii::$app->request->post('authors');
            $document->saveAuthors($authors);
            return $this->redirect(['view', 'id' => $document->id]);
        }

        return $this->render('authors', [
            'selectedAuthors' => $selectedAuthors,
            'authors' => $authors
        ]);
    }
}
