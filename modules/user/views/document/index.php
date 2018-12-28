<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ЭУИ';
$this->params['breadcrumbs'][] = ['label' => 'Календарный план', 'url' => ['../user/plan/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['../user/specialty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Дисциплины', 'url' => ['../user/discipline/index']];
$this->params['breadcrumbs'][] = ['label' => 'Вид ЭУИ', 'url' => ['../user/type/index']];
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['../user/language/index']];
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['../user/author/index']];
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ЭУИ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Специальность',
                'attribute' => 'specialty',
                'value' => 'specialty.name',
                //'attribute'=>'specialty.name',
                'format' => 'raw',
            ],
            [
                'label' => 'Дисциплина',
                'attribute' => 'discipline',
                'value'=>'discipline.name',
                'format' => 'raw',
            ],
            [
                'label' => 'Название ЭУИ',
                'attribute'=>'name',
                'format' => 'raw',
            ],
            [
                'label' => 'Вид ЭУИ',
                'attribute'=>'type',
                'value'=>'type.name',
                'format' => 'raw',
            ],
            [
                'label' => 'Язык разработки',
                'attribute'=>'language',
                'value'=>'language.name',
                'format' => 'raw',
            ],
            [
                'label' => 'Авторы',
                //'attribute'=>'documentAuthors',
                'format' => 'raw',
                'value' => function($model) {
                    //var_dump($model);
                    /*
                    $result = ArrayHelper::map(app\models\Author::find()
                        ->select(['au.name', 'au.surname', 'au.patronymic'])
                        ->from(['document docu', 'document_author da', 'author au'])
                        ->where(['docu.id'=>7])
                        ->andWhere(['docu.id' => 'da.doument_id'])
                        ->andWhere(['au.id' => 'da.author_id'])
                        //->orderBy('name ASC')
                        ->all();
                        ->joinWith('documentAuthors')
                        ->all(),'id',"name.' '.surname");
                        */
                        //var_dump($model->id);
                        $result = app\models\Author::find()
                        ->innerjoinWith('documentAuthors')
                        ->where(['document_author.document_id'=>$model->id])
                        ->orderBy('surname ASC')
                        ->all();
//var_dump($result);
                        $aname = '';
                        foreach ($result as $key => $value) {
                            $aname = $aname.$value['surname'].' '.$value['name'].' '.$value['patronymic'].';</br>';
                        }
                        return $aname;
/*
                        ->innerjoinWith('documentAuthors')
                        ->all();
                        */
                    //var_dump($result);
                    //return $result['surname'];
                },

            ],
            [
                'label' => 'Срок готовности',
                'attribute'=>'finish_date',
                'format'=>['date', 'd.M.Y'],
            ],

            //'name:ntext',
            //'type_id',
            #'language_id',
            #'discipline_id',
            #'specialty_id',
            #'plan_id',
            #'responsible_id',
            #'reviewer_id',
            #'finish_date',
            #'token',
            #'status',
            #'path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
