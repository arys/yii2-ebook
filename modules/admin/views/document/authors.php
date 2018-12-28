<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= Html::dropDownList('authors', $selectedAuthors, $authors, ['class' => 'form-control', 'multiple' => true]); ?>
    
    <? //Html::checkboxList('authors', $selectedAuthors, $authors); ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
