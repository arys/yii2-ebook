<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Remark */

$this->title = 'Оставить рецензию';
//$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-create">

    
    <?php if($document->name != null): ?>
    <h1><?= Html::encode($this->title) ?> на документ <?=$document->name?></h1>
        <h3>Здравствуйте, ваш email <?= $document->reviewer->email ?></h3>
        <p><a href="/web/uploads/<?=$document->path?>">Скачать файл</a></p>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php else: ?>

        <div class="alert alert-danger" role="alert">
          Неверный токен!
        </div>
    
    <?php endif; ?>
</div>
