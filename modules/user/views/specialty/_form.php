<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Specialty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Наименование')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'code')->label('Шифр')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kafedra_id')->label('Кафедра')->dropDownList(
        ArrayHelper::map($kafedra, 'id', 'name')
    );
    ?>


    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
