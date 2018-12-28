<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Levels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="levels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Наименование')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->label('Аббревиатура')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'parent_id')->textInput() ?>

    <?//= $form->field($model, 'type_id')->textInput() ?>

    <?//= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
