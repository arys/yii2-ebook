<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedra */

$this->title = 'Редактировать кафедру: ';
$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['../moderator/faculty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Кафедры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="kafedra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'faculties' => $faculties,
    ]) ?>

</div>
