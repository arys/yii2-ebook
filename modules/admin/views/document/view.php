<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Document */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Attach File', ['attach-file', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Add Authors', ['add-authors', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
            [
                'format' => 'raw',
                'label' => 'Specialty',
                'value' => function($data) {
                    return $data->specialty->name;
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Responsible',
                'value' => function($data) {
                    return $data->responsible->name;
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Reviewer',
                'value' => function($data) {
                    return $data->reviewer->email;
                }
            ],
            'finish_date',
            'token:ntext',
            'status',
            'path:ntext',
        ],
    ]) ?>

</div>
