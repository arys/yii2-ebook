<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'user_id')->dropDownList($users); ?>

    <?= $form->field($model, 'suname')->label('Фамилия')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->label('Имя')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_name')->label('Отчество')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kafedra_id')->label('Кафедры')->dropDownList($kafedras); ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
