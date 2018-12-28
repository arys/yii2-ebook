<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kafedra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Наименование')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->label('Аббревиатура')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'parent_id')->label('Факультеты')->dropDownList($faculties); ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
