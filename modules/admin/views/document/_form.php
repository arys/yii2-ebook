<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'finish_date')->textInput() ?>
    
    <?= $form->field($model, 'type_id')->dropDownList($types); ?>
    
    <?= $form->field($model, 'language_id')->dropDownList($languages); ?>
    
    <?= $form->field($model, 'discipline_id')->dropDownList($disciplines); ?>
    
    <?= $form->field($model, 'specialty_id')->dropDownList($specialties); ?>
    
    <?= $form->field($model, 'plan_id')->dropDownList($plans); ?>
    
    <?= $form->field($model, 'responsible_id')->dropDownList($responsibles); ?>
    
    <?= $form->field($model, 'reviewer_id')->dropDownList($reviewers); ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
