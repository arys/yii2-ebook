<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Remark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="remark-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <? //$form->field($model, 'reviewer_id')->textInput() ?>

    <? //$form->field($model, 'date')->textInput() ?>

    <? //$form->field($model, 'status')->textInput() ?>

    <? //$form->field($model, 'document_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
