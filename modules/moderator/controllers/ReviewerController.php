<?php

namespace app\modules\moderator\controllers;

use Yii;
use app\models\Document;
use app\models\Levels;
use app\models\Reviewer;
use app\models\ReviewerSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReviewerController implements the CRUD actions for Reviewer model.
 */
class ReviewerController extends Controller
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
     * Lists all Reviewer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReviewerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reviewer model.
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
     * Creates a new Reviewer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reviewer();
        $facultiesObject = Levels::find()->where(['type_id' => 1])
            ->orderBy(['(name)' => SORT_ASC])
            ->all();
        if($facultiesObject != null) {
            foreach($facultiesObject as $faculty) {
                $faculties[$faculty->id] = $faculty->name;
            }
        }
        else {
            $faculties = [0 => 'Нет Факультетов'];
        }
        $kafedrasObject = Levels::find()->where(['type_id' => 2])
            ->orderBy(['(name)' => SORT_ASC])
            ->all();
        if($kafedrasObject != null) {
            foreach($kafedrasObject as $kafedra) {
                $kafedras[$kafedra->id] = $kafedra->name;
            }
        }
        else {
            $kafedras = [0 => 'Нет кафедр'];
        }

        $form_model = new Reviewer();
        if(\Yii::$app->request->isAjax){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $pfacsel = (int)$_POST['pfacsel'];
            $fackaf = Levels::find()
                ->where(['type_id' => 2])
                ->andWhere(['parent_id' => $pfacsel])
                ->orderBy(['(name)' => SORT_ASC])
                ->asArray()
                ->all();
            return $fackaf;

        }
        if ($model->load(Yii::$app->request->post())) {
            $facid = (int)$_POST['Reviewer']['level_id'];
            $kafid = (int)$_POST['Reviewer']['level_id'];
            $model->level_id = $facid;
            $model->level_id = $kafid;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'     => $model,
            'faculties' => $faculties,
            'kafedras' => $kafedras,
        ]);

    }

    /**
     * Updates an existing Reviewer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionMail($id)
    {

        $docfile = new UploadForm();
        $model = $this->findModel($id);
        $id = (int)$id;
        $documentsObject = Document::find()
            ->where(['reviewer_id' => $id])
            ->orderBy(['name' => SORT_ASC])
            ->all();
        if ($documentsObject != null) {
            foreach ($documentsObject as $doc) {
                $documents[$doc->id] = $doc->name;
            };
        }
        else {
            $documents = [0 => 'Нет ЭУИ'];
        }
        if (Yii::$app->request->isPost) {
            $email = $model -> email;
            $docfile->file = UploadedFile::getInstance($docfile, 'file');
            $docfile->file->saveAs('uploads/' . $docfile->file->baseName . '.' . $docfile->file->extension);
            $docfile = 'uploads/' . $docfile->file->baseName . '.' . $docfile->file->extension;
            Yii::$app->mailer->compose()
                ->setFrom(['almittt@mail.ru' => 'Письмо с сайта'])
                ->setTo($email)
                ->setSubject('Для написания рецензии на ')
                ->setHtmlBody('<a href="http://token/admin/remark/create?token=rdfgthfghjgkj">http://token/admin/remark/create?token=rdfgthfghjgkj</a>')
                ->attach($docfile)
                ->send();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        /*if (Yii::$app->request->isPost  && $docfile->validate()) {
            //var_dump($docfile->file);
            $docfile->file = UploadedFile::getInstance($docfile, 'file');
            //var_dump($docfile->file);
            $docfile->file->saveAs('uploads/' . $docfile->file->baseName . '.' . $docfile->file->extension);
        }*/

        return $this->render('mail', [
            'model' => $model,
            'documents' => $documents,
            'docfile' => $docfile,
        ]);
    }
    /**
     * Finds the Reviewer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reviewer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reviewer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
