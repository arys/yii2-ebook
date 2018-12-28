<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Type */

$this->title = 'Добавить ЭУИ';
$this->params['breadcrumbs'][] = ['label' => 'Виды ЭУИ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
