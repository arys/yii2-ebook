<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KafedraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
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

$this->title = 'Кафедры';
/*$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['../moderator/levels/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Ответственные', 'url' => ['../moderator/responsible/index']];*/
?>
<div class="kafedra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'Кафедры',
                'attribute'=>'name',
                'format' => 'raw',
            ],
            [
                'label' => 'Аббревиатура',
                'attribute'=>'short_name',
                'format' => 'raw',
            ],
            [
                'label' => 'Фамилия',
                'attribute'=>'responsiblesOne.suname',
                'format' => 'raw',
            ],
            [
                'label' => 'Имя',
                'attribute'=>'responsiblesOne.name',
                'format' => 'raw',
            ],
            [
                'label' => 'Отчество',
                'attribute'=>'responsiblesOne.second_name',
                'format' => 'raw',
            ],
            [
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('Учебный план', ['../moderator/document', 'kafid' =>$model->id], ['class' => 'btn btn-primary']);
                },
            ],
        ],
    ]); ?>
</div>
