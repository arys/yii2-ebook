<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kafedra_id')->label('Кафедра')->dropDownList(
        ArrayHelper::map($kafedra, 'id', 'name')
    );
    ?>

    <?=$form->field($model, 'date_start')->label('Дата начала')->widget(\kartik\date\DatePicker::class,
        [
            'options' => ['placeholder' => 'Выберите дату ...'],
            'pluginOptions' => [
                'format' => 'dd.mm.yyyy',
                'todayHighlight' => true,
            ]
        ]
    )
    ?>

    <?= $form->field($model, 'date_end')->label('Дата окончания')->widget(\kartik\date\DatePicker::class,
        [
            'options' => ['placeholder' => 'Выберите дату ...'],
            'pluginOptions' => [
                'format' => 'dd.mm.yyyy',
                'todayHighlight' => true
            ]
        ]
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
