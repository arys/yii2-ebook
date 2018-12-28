<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
$date_start = date("d.m.Y", strtotime($model->date_start));
$date_end = date("d.m.Y", strtotime($model->date_end));
$this->title = "Календарный план за период с ".$date_start." по ".$date_end;
$this->params['breadcrumbs'][] = ['label' => 'Учебный план', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Календарный план за период с ".$date_start." по ".$date_end, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kafedra' => $kafedra,
    ]) ?>

</div>
