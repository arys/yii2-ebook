<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Название ЭУИ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList($dropdownData['types']); ?>
    
    <?= $form->field($model, 'language_id')->dropDownList($dropdownData['languages']); ?>
    
    <?= $form->field($model, 'discipline_id')->dropDownList($dropdownData['disciplines']); ?>
    
    <?= $form->field($model, 'specialty_id')->dropDownList($dropdownData['specialties']); ?>

    <?//= $form->field($model, 'plan_id')->textInput() ?>

    <?//= $form->field($model, 'responsible_id')->label('Ответственный')->textInput() ?>

    <?//= $form->field($model, 'reviewer_id')->label('Рецензент')->textInput() ?>

    <?//= $form->field($model, 'finish_date')->label('Срок готовности')->textInput() ?>
    <?=$form->field($model, 'finish_date')->label('Срок готовности')->widget(\kartik\date\DatePicker::class,
        [
            'options' => ['placeholder' => 'Выберите дату ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
            ]
        ]
    )
    ?>

    <?//= $form->field($model, 'token')->label('Название ЭУИ')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'status')->label('Название ЭУИ')->textInput() ?>

    <?//= $form->field($model, 'path')->label('Название ЭУИ')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
