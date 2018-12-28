<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList($users); ?>

    <?= $form->field($model, 'kafedra_id')->dropDownList($kafedras); ?>
    
    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'second_name')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
