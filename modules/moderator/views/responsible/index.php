<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsibleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ответственные';
/*$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['../moderator/levels/index']];
$this->params['breadcrumbs'][] = ['label' => 'Кафедры', 'url' => ['../moderator/levelskaf/index']];
$this->params['breadcrumbs'][] = $this->title;*/

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
<div class="responsible-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'kafedra_id',
            [
                'label' => 'Фамилия',
                'attribute'=>'suname',
                'format' => 'raw',

            ],
            [
                'label' => 'Имя',
                'attribute'=>'name',
                'format' => 'raw',

            ],
            [
                'label' => 'Отчество',
                'attribute'=>'second_name',
                'format' => 'raw',

            ],
            [
                'label' => 'Назначение',
                'attribute'=>'rstatus',
                'format' => 'raw',

            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
