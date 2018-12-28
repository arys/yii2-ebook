<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Reviewer */

$this->title = 'Назначит рецензента: ';
$this->params['breadcrumbs'][] = ['label' => 'Рецензенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Рецензент', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="reviewer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="reviewer-form">

        <?php $form = ActiveForm::begin(); ?>

        <?//= $form->field($model, 'email')->label('Электронная почта')->textInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'phone')->label('Телефон')->textInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'level')->textInput() ?>

        <?//= $form->field($model, 'id')->label('Список рецензентов')->dropDownList($model->email); ?>

        <div class="form-group">
            <?= Html::submitButton('Назначить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
