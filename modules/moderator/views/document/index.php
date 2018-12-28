<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;


if (isset($plan)) {
    $this->title = 'ЭУИ учебного плана за период с '.$date_start.' до '.$date_end;
}
else{
    $this->title = 'Электронные учебные издания';
}

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*$this->params['breadcrumbs'][] = ['label' => 'Календарный план', 'url' => ['../user/plan/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['../user/specialty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Дисциплины', 'url' => ['../user/discipline/index']];
$this->params['breadcrumbs'][] = ['label' => 'Вид ЭУИ', 'url' => ['../user/type/index']];
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['../user/language/index']];
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['../user/author/index']];*/

echo Nav::widget([
    //'activateItems' => false,
    'options' => [
        'class' => 'nav nav-tabs navbar-inverse'
    ],
    'items' => [
        [
            'label' => 'Главная',
            'url' =>['#']
        ],
        [
            'label' => 'Факультеты',
            'url' =>['../moderator/levels/index?tid=1']
        ],
        [
            'label' => 'Кафедры',
            'url' =>['../moderator/levelskaf/index?tid=2']
        ],
        [
            'label' => 'Ответственные',
            'url' =>['../moderator/responsible/index']
        ],
        [
            'label' => 'Учебный план',
            'url' =>['../moderator/plan/index']
        ],
        [
            'label' => 'ЭУИ',
            'items' => [
                [
                    'label' => 'Список ЭУИ',
                    'url' =>['../moderator/document/index'],
                ],
                '<li class = "divider"></li>',
                [
                    'label' => 'Язык разработки',
                    'url' =>['../moderator/language/index'],
                ],
                '<li class = "divider"></li>',
                [
                    'label' => 'Виды ЭУИ',
                    'url' =>['../moderator/type/index']
                ],
                '<li class = "divider"></li>',
                [
                    'label' => 'Авторы',
                    'url' =>['../moderator/author/index']
                ],
            ]
        ],
        [
            'label' => 'Рецензенты',
            'url' =>['../moderator/reviewer/index']
        ],
    ]

]);

?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],

        'columns' => [
            [
                'label' => 'Специальность',
                'attribute' => 'specialty',
                'value' => 'specialty.name',
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
                'format' => 'raw',
                'value' => function($model) {
                        $result = app\models\Author::find()
                        ->innerjoinWith('documentAuthors')
                        ->where(['document_author.document_id'=>$model->id])
                        ->orderBy('surname ASC')
                        ->all();
                        $aname = '';
                        foreach ($result as $key => $value) {
                            $aname = $aname.$value['surname'].' '.$value['name'].' '.$value['patronymic'].';</br>';
                        }
                        return $aname;
                },

            ],
            [
                'label' => 'Статус',
                'attribute'=>'status',
                'format' => 'raw',
                'content'=>function($data){

                    switch ($data->status) {
                        case 0:
                            return 'Не проверен';
                            break;
                        case 1:
                            return 'Проверен';
                            break;
                        case 2:
                            return 'Есть замечания';
                            break;
                        case 3:
                            return 'Просрочен';
                            break;
                    }

                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    array(
                        "0"=>"Не проверен",
                        "1"=>"Проверен",
                        "2"=>"Есть замечания",
                        "3"=>"Просрочен",
                    ),
                    ['class' => 'form-control', 'prompt' => 'Все статусы']
                )
            ],
            [
                'label' => 'Срок готовности',
                'attribute'=>'finish_date',
                'format'=>['date', 'd.M.Y'],
            ],
            [
                'label' => 'Рецензент',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('Назначить рецензента', ['reviewer-set', 'id' =>$model->id], ['class' => 'btn btn-primary']);
                },
            ]
            /*[
                'label' => 'Рецензенты',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::ActiveDropDownList($model,'id',
                        ArrayHelper::map(app\models\Reviewer::find()
                            ->from('reviewer re, document do, specialty sp')
                            ->where(['sp.id '=>$model->specialty_id ])
                            ->andWhere('sp.kafedra_id = re.kafedra_id')
                            ->orderBy('email ASC')->all(), 'id', 'email'),
                        [
                            'prompt' => 'Выбрать кафедру',
                            'onchange' => '
                               $.ajax({
                                 url: "/moderator/levelskaf/select-kaf",
                                 type: "get",
                                 data: { tid : $(this).val()},

                                });
                            '
                        ]
                    );

                },

            ],*/
        ],
    ]);
    ?>
</div>
