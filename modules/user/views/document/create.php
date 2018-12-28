<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Document */

$this->title = 'Добавить ЭУИ';
$this->params['breadcrumbs'][] = ['label' => 'ЭУИ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-create">
    
    <h1><?= Html::encode($this->title) ?> к плану от <?= $plan->date_start . ' : ' . $plan->date_end ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dropdownData' => $dropdownData
    ]) ?>

</div>
