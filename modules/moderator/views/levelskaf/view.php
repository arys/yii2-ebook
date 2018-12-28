<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedra */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['../moderator/faculty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Кафедры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kafedra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную кафедру?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Наименование',
                'attribute'=>'name',
                'format' => 'raw',
            ],
            [
                'label' => 'Аббревиатура',
                'attribute'=>'short_name',
                'format' => 'raw',
            ],
            //'id',
            //'name:ntext',
            //'faculty_id',
        ],
    ]) ?>

</div>
