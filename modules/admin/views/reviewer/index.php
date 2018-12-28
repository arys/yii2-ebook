<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReviewerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviewers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviewer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reviewer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:ntext',
            'phone:ntext',
            'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
