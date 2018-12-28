<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Reviewer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviewer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->label('Электронная почта')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->label('Телефон')->textInput(['maxlength' => true]) ?>

    <?
        $allfac = [ 'prompt' => 'Выберите факультет...','id' => 'FacList'];
        $allkaf = [ 'prompt' => 'Выберите кафедру...', 'id' => 'KafList'];
    ?>

    <?= $form->field($model, 'level_id')->label('Список факультетов')->dropDownList($faculties, $allfac);?>

    <div id = "KafDiv">

    <?= $form->field($model, 'level_id')->label('Список кафедр')->dropDownList($kafedras, $allkaf); ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?
    $js = <<<JS
    $( document ).ready(function() {
        $( "#KafDiv" ).hide();
    });    
    $('#FacList').change(function(){
        var facsel = $("#FacList option:selected").val();
                $.ajax({
                    url: '/moderator/reviewer/create',
                    type: 'POST',
                    data: {
                        pfacsel: facsel,    
                    },
                    success: function(res){
                        console.log(res);
                        //alert(res[0].name);
                        var kafsel = document.getElementById("KafList");
                        $("#KafList").empty();
                        var n = res.length;
                        var i;
                        if(n == 0) {
                            var opt = document.createElement("option"); // Ввод пункта
                            opt.innerHTML= 'Нет кафедр';
                            kafsel.appendChild(opt);
                        }
                        else{
                            for (i=0;i<n;i++){
                                
                                var opt = document.createElement("option"); // Ввод пункта
                                opt.setAttribute("value", res[i].id);
                                opt.innerHTML= res[i].name;
                                kafsel.appendChild(opt);
                            }
                        }
                    },
                });                
        switch(facsel) {
            case '':
                $( "#KafDiv" ).hide();
                facsel = $("#FacList option:selected").val();
                break;
            default:
                $( "#KafDiv" ).show();
                /*var kafsel = $("#KafList option:selected").val();
                $.ajax({
                    url: '/moderator/reviewer/create',
                    type: 'POST',
                    data: kafsel,
                    success: function(res){
                        console.log(res);
                    },
                });*/                
                break;
        }               
    });
JS;
    $this->registerJs($js);
    ?>
</div>

