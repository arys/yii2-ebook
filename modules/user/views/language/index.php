<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Языки';
$this->params['breadcrumbs'][] = ['label' => 'Календарный план', 'url' => ['../user/plan/index']];
$this->params['breadcrumbs'][] = ['label' => 'ЭУИ', 'url' => ['../user/document/index']];
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['../user/specialty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Дисциплины', 'url' => ['../user/discipline/index']];
$this->params['breadcrumbs'][] = ['label' => 'Виды ЭУИ', 'url' => ['../user/type/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['../user/author/index']];
?>
<div class="language-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить язык', ['create'], ['class' => 'btn btn-success']) ?>
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
                'label' => 'Наименование',
                'attribute'=>'name',
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
