<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responsible */

$name = $model->name;
$surname = $model->suname;
$secname = $model->second_name;
$this->title = $surname." ".$name." ".$secname;
$this->params['breadcrumbs'][] = ['label' => 'Ответственные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="responsible-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kafedras' => $kafedras,
        'users' => $users,
    ]) ?>

</div>
