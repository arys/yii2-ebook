<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Document;
use app\models\DocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Type;
use app\models\Language;
use app\models\Discipline;
use app\models\Specialty;
use app\models\Plan;
use app\models\Responsible;
use app\models\Reviewer;
use app\models\Kafedra;
use app\models\FileUpload;
use app\models\Author;

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
    public function actionCreate()
    {
        $model = new Document();
        
        $typesObject = Type::find()->all();
        if($typesObject != null) {
            foreach($typesObject as $type) $types[$type->id] = $type->name;
        } else $types = [0 => 'Нет типов'];
        
        $languagesObject = Language::find()->all();
        if($languagesObject != null) {
            foreach($languagesObject as $language) $languages[$language->id] = $language->name;
        } else $languages = [0 => 'Нет языков'];
        
        $disciplinesObject = Discipline::find()->all();
        if($disciplinesObject != null) {
            foreach($disciplinesObject as $discipline) $disciplines[$discipline->id] = $discipline->name;
        } else $disciplines = [0 => 'Нет дисциплин'];
        
        $specialtiesObject = Specialty::find()->all();
        if($specialtiesObject != null) {
            foreach($specialtiesObject as $specialty) $specialties[$specialty->id] = $specialty->name;
        } else $specialties = [0 => 'Нет специальностей'];
        
        $plansObject = Plan::find()->all();
        if($plansObject != null) {
            foreach($plansObject as $plan) {
                $kafedra = Kafedra::find()->where(['id' => $plan->kafedra_id])->all();
                $plans[$plan->id] = "План: {$kafedra[0]->name}, от $plan->date_start : $plan->date_end";
            } 
        } else $plans = [0 => 'Нет планов'];
        
        $responsiblesObject = Responsible::find()->all();
        if($responsiblesObject != null) {
            foreach($responsiblesObject as $responsible) $responsibles[$responsible->id] = $responsible->name;
        } else $responsibles = [0 => 'Нет ответственных'];
        
        $reviewersObject = Reviewer::find()->all();
        if($reviewersObject != null) {
            foreach($reviewersObject as $reviewer) $reviewers[$reviewer->id] = $reviewer->email;
        } else $reviewers = [0 => 'Нет обзорщиков'];
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'types' => $types,
            'languages' => $languages,
            'disciplines' => $disciplines,
            'specialties' => $specialties,
            'plans' => $plans,
            'responsibles' => $responsibles,
            'reviewers' => $reviewers,
        ]);
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
        
        $typesObject = Type::find()->all();
        if($typesObject != null) {
            foreach($typesObject as $type) $types[$type->id] = $type->name;
        } else $types = [0 => 'Нет типов'];
        
        $languagesObject = Language::find()->all();
        if($languagesObject != null) {
            foreach($languagesObject as $language) $languages[$language->id] = $language->name;
        } else $languages = [0 => 'Нет языков'];
        
        $disciplinesObject = Discipline::find()->all();
        if($disciplinesObject != null) {
            foreach($disciplinesObject as $discipline) $disciplines[$discipline->id] = $discipline->name;
        } else $disciplines = [0 => 'Нет дисциплин'];
        
        $specialtiesObject = Specialty::find()->all();
        if($specialtiesObject != null) {
            foreach($specialtiesObject as $specialty) $specialties[$specialty->id] = $specialty->name;
        } else $specialties = [0 => 'Нет специальностей'];
        
        $plansObject = Plan::find()->all();
        if($plansObject != null) {
            foreach($plansObject as $plan) {
                $kafedra = Kafedra::find()->where(['id' => $plan->kafedra_id])->all();
                $plans[$plan->id] = "План: {$kafedra[0]->name}, от $plan->date_start : $plan->date_end";
            } 
        } else $plans = [0 => 'Нет планов'];
        
        $responsiblesObject = Responsible::find()->all();
        if($responsiblesObject != null) {
            foreach($responsiblesObject as $responsible) $responsibles[$responsible->id] = $responsible->name;
        } else $responsibles = [0 => 'Нет ответственных'];
        
        $reviewersObject = Reviewer::find()->all();
        if($reviewersObject != null) {
            foreach($reviewersObject as $reviewer) $reviewers[$reviewer->id] = $reviewer->email;
        } else $reviewers = [0 => 'Нет ответственных'];
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'types' => $types,
            'languages' => $languages,
            'disciplines' => $disciplines,
            'specialties' => $specialties,
            'plans' => $plans,
            'responsibles' => $responsibles,
            'reviewers' => $reviewers,
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
