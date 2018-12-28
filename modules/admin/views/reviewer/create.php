<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reviewer */

$this->title = 'Create Reviewer';
$this->params['breadcrumbs'][] = ['label' => 'Reviewers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviewer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
