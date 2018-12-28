<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Responsible */

$name = $model->name;
$surname = $model->suname;
$secname = $model->second_name;
$this->title = $surname." ".$name." ".$secname;
$this->params['breadcrumbs'][] = ['label' => 'Ответственные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsible-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить ответственного?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            //'kafedra_id',
            //'name:ntext',
            //'suname:ntext',
            //'second_name:ntext',
            [
                'label' => 'Фамилия',
                'attribute'=>'suname',
                'format' => 'raw',
            ],
            [
                'label' => 'Имя',
                'attribute'=>'name',
                'format' => 'raw',
            ],
            [
                'label' => 'Отчество',
                'attribute'=>'second_name',
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
