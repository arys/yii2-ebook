<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReviewerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рецензенты';

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
<div class="reviewer-index">

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
            //'email:email',
            //'phone',
            //'level',
            [
                'label' => 'Почта',
                'attribute'=>'email',
                'format' => 'raw',

            ],
            [
                'label' => 'Телефон',
                'attribute'=>'phone',
                'format' => 'raw',

            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}  {update}',
            ],
            [
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('Отправить письмо', ['../moderator/reviewer/mail', 'id' =>$model->id], ['class' => 'btn btn-primary']);
                },
            ],

        ],
    ]); ?>
</div>
