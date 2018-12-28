<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reviewer */

$this->title = 'Редактировать: ';
$this->params['breadcrumbs'][] = ['label' => 'Рецензенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Рецензент', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="reviewer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
