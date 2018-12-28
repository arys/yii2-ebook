<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kafedra */

$this->title = 'Добавить кафедру';
$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['../moderator/levels/index']];
$this->params['breadcrumbs'][] = ['label' => 'Кафедры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kafedra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'faculties' => $faculties
    ]) ?>

</div>
