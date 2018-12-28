<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
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
            'url' =>['#']
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
/* @var $searchModel app\models\LevelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Факультеты';
/*$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Кафедры', 'url' => ['../moderator/levelskaf/index?tid=2']];
$this->params['breadcrumbs'][] = ['label' => 'Ответственные', 'url' => ['../moderator/responsible/index']];*/
?>
<div class="levels-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Факультеты',
                'attribute'=>'name',
                'format' => 'raw',

            ],
            [
                'label' => 'Аббревиатура',
                'attribute'=>'short_name',
                'format' => 'raw',
            ],
            [
                'label' => 'Кафедры',
                //'attribute'=>'short_name',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::ActiveDropDownList($model,'id',
                        ArrayHelper::map(app\models\Levels::find()->where(['parent_id'=>$model->id])
                            ->orderBy('name ASC')->all(), 'id', 'name'),
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

            ],
        ],
    ]); ?>
</div>
