<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Nav;

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


/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Календарный план';
/*$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'ЭУИ', 'url' => ['../user/document/index']];
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['../user/specialty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Дисциплины', 'url' => ['../user/discipline/index']];
$this->params['breadcrumbs'][] = ['label' => 'Вид ЭУИ', 'url' => ['../user/type/index']];
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['../user/language/index']];
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['../user/author/index']];*/
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'kafedra_id',
            //'status',
            [
                'label' => 'Кафедра',
                'attribute'=>'kafedra',
                'value' => 'kafedra.name'
            ],
            [
                'label' => 'Аббревиатура',
                'attribute'=>'kafedra',
                'value' => 'kafedra.short_name'
            ],
            [
                'label' => 'Дата начала',
                'attribute'=>'date_start',
                'format'=>['date', 'd.M.Y'],

            ],
            [
                'label' => 'Дата окончания',
                'attribute'=>'date_end',
                'format'=>['date', 'd.M.Y'],
            ],
            [
                //'attribute'=>'short_name',
                'format' => 'raw',
                'value' => function($model) {
                   return Html::a('ЭУИ', ['../moderator/document', 'planid' =>$model->id], ['class' => 'btn btn-primary']);
                },
            ],
        ]
    ]);
    ?>
</div>
