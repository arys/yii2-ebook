<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Remark */

$this->title = 'Update Remark: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="remark-update">

    <h1>Редактирование рецензии на документ <?=$model->document->name?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
