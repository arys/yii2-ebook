<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecialtySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Календарный план', 'url' => ['../user/plan/index']];
$this->params['breadcrumbs'][] = ['label' => 'ЭУИ', 'url' => ['../user/document/index']];
$this->title = 'Специальности';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Дисциплины', 'url' => ['../user/discipline/index']];
$this->params['breadcrumbs'][] = ['label' => 'Виды ЭУИ', 'url' => ['../user/type/index']];
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['../user/language/index']];
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['../user/author/index']];

?>
<div class="specialty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить специальность', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'kafedra_id',
            [
                'label' => 'Наименование',
                'attribute'=>'name',
                'format' => 'raw',
            ],
            [
                'label' => 'Шифр',
                'attribute'=>'code',
                'format' => 'raw',
            ],
            [
                'label' => 'Дисциплины',
                //'attribute'=>'code',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::ActiveDropDownList($model,'id',
                        ArrayHelper::map(app\models\Discipline::find()->where(['specialty_id'=>$model->id])
                            ->orderBy('name ASC')->all(), 'id', 'name')
                        ,                   [
                            'prompt' => 'Выбрать дисциплину',
                            'onchange' => '
                               $.ajax({
                                 url: "/user/discipline/view",
                                 type: "get",
                                 data: { id : $(this).val()},

                                });
                            '
                        ]
                    );

                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
