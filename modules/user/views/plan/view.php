<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */

$date_start = date("d.m.Y", strtotime($model->date_start));
$date_end = date("d.m.Y", strtotime($model->date_end));
$this->title = "Календарный план за период с ".$date_start." по ".$date_end;
$this->params['breadcrumbs'][] = ['label' => 'Календарный план', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данный календарный план?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'kafedra_id',
            //'status',
            [
                'label' => 'Кафедра',
                'value' => $kafedra,
            ],
            [
                'label' => 'Дата начала',
                'value' => $date_start,
            ],
            [
                'label' => 'Дата окончания',
                'value' => $date_end,
            ],

            //'date_start',
            //'date_end',
        ],
    ]) ?>

</div>
