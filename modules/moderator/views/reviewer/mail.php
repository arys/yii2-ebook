<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View*/
/* @var $model app\models\Reviewer*/
$this->title = 'Отправить ЭУИ на рецензию';
$this->params['breadcrumbs'][] = ['label' => 'Рецензенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviewer-create">

    <h1><?= Html::encode($this->title) ?></h1>

</div>

<div class="reviewer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'id')->label('Список ЭУИ рецензента')->dropDownList($documents); ?>


    <?= $form->field($docfile, 'file')->label('Загрузить ЭУИ')->fileInput() ?>

    <?//= $form->field($docfile, 'file')->label('Загрузить ЭУИ')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
