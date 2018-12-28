<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Levels */

$this->title = 'Добавить факультет';
$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="levels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
