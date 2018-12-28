<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Document', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name:ntext',
            [
                'format' => 'raw',
                'label' => 'Type',
                'value' => function($data) {
                    return $data->type->name;
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Language',
                'value' => function($data) {
                    return $data->language->name;
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Discipline',
                'value' => function($data) {
                    return $data->discipline->name;
                }
            ],
            //'specialty_id',
            [
                'format' => 'raw',
                'label' => 'Plan period',
                'value' => function($data) {
                    return $data->plan->date_start . ' : ' . $data->plan->date_end;
                }
            ],
            //'responsible_id',
            //'reviewer_id',
            //'finish_date',
            //'token:ntext',
            //'status',
            //'path:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
