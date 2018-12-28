<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Remark */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-view">

    <h1>Рецензия на <?=$model->document->name?> от <?=$model->reviewer->email?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить рецензию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            'reviewer_id',
            'date',
            'status',
            'document_id',
        ],
    ]) ?>

</div>
