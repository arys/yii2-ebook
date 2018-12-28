<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Календарный план';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'ЭУИ', 'url' => ['../user/document/index']];
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['../user/specialty/index']];
$this->params['breadcrumbs'][] = ['label' => 'Дисциплины', 'url' => ['../user/discipline/index']];
$this->params['breadcrumbs'][] = ['label' => 'Вид ЭУИ', 'url' => ['../user/type/index']];
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['../user/language/index']];
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['../user/author/index']];
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать план', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'kafedra_id',
            //'status',
            [
                'label' => 'Дата начала',
                'attribute'=>'date_start',
                'format'=>['date', 'd.M.Y'],

            ],
            [
                'label' => 'Дата окончания',
                'attribute'=>'date_end',
                'format'=>['date', 'd.M.Y'],
            ],
            //'date_start',
            //'date_end',

            //['class' => 'yii\grid\ActionColumn'],

            [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{view} {update} {delete} {info}',
                //Текст в title ссылки, что виден при наведении
                'buttons' => [
                    'info' => function ($url, $model, $key) {
                        $iconName = "book";
                        //Текст в title ссылки, что виден при наведении
                        $title = \Yii::t('yii', 'ЭУИ');
                        $id = 'info-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];
                        $url = Url::to(['../user/document/create', 'plan_id' => $model->id]);
                        //Для стилизации используем библиотеку иконок
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                        //Обработка клика на кнопку
                        /*$js = <<<JS
                            $("#{$id}").on("click",function(event){
                                event.preventDefault();
                                var myModal = $("#myModal");
                                var modalBody = myModal.find('.modal-body');
                                var modalTitle = myModal.find('.modal-header');
                                modalTitle.find('h2').html('Информация.');
                                modalBody.html('Тут будет информация.');
                                myModal.modal("show");
                            });
JS;
                        //Регистрируем скрипты
                            $this->registerJs($js, \yii\web\View::POS_READY, $id);*/
                            return Html::a($icon, $url, $options);
                    }
                ],
            ]
        ]
    ]);
    ?>
</div>
