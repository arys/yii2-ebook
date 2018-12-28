<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reviewer */

$this->title = 'Рецензент';
$this->params['breadcrumbs'][] = ['label' => 'Рецензенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviewer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'email:email',
            //'phone',
            //'level',
            [
                'label' => 'Почта',
                'attribute'=>'email',
                'format' => 'raw',

            ],
            [
                'label' => 'Телефон',
                'attribute'=>'phone',
                'format' => 'raw',

            ],
        ],
    ]) ?>

</div>
