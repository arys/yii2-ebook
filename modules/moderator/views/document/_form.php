<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Название ЭУИ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->label('Вид ЭУИ')->textInput() ?>

    <?= $form->field($model, 'language_id')->label('Язык разработки')->textInput() ?>

    <?= $form->field($model, 'discipline_id')->label('Дисциплина')->textInput() ?>

    <?= $form->field($model, 'specialty_id')->label('Специальность')->textInput() ?>

    <?//= $form->field($model, 'plan_id')->textInput() ?>

    <?//= $form->field($model, 'responsible_id')->label('Название ЭУИ')->textInput() ?>

    <?//= $form->field($model, 'reviewer_id')->label('Название ЭУИ')->textInput() ?>

    <?= $form->field($model, 'finish_date')->label('Срок готовности')->textInput() ?>

    <?//= $form->field($model, 'token')->label('Название ЭУИ')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'status')->label('Название ЭУИ')->textInput() ?>

    <?//= $form->field($model, 'path')->label('Название ЭУИ')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
