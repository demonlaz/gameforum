<<<<<<< HEAD
=======

>>>>>>> a3f31ba2fe6a0a87eb031c1e992e11292306eeaa
<?php

use yii\bootstrap\ActiveForm;

yii\widgets\Pjax::begin(['id' => 'sdfdf', 'timeout' => 7000, 'enablePushState' => false]);
if ($error == true) {
    echo "<span style='color:red;'>Сообщение не было добавлено!</span>";
}

if ($send == true) {
    echo "<span style='color:green;'>Сообщение добавлено!</span>";
}
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => [$urlSend],
            'options' => ['data-pjax' => true, 'style' => 'color:white;font-size:16px;']
        ]);
$options = ['style' => "color:white;"]
?>
    <?= $form->field($modelForm, 'id_games')->hiddenInput(['value' => $id_games])->label('') ?>
    <?= $form->field($modelForm, 'id_commenta')->hiddenInput(['value' => 0,'id'=>'hiddeninputcomment'])->label('') ?>
<div class="youplay-textarea">
<<<<<<< HEAD
<?= $form->field($modelForm, 'content')->textarea(['placeholder' => "Написать комментарий", 'rows' => 8])->label('') ?>
=======


<?= $form->field($modelForm, 'content')->textarea(['placeholder' => "Написать комментарий", 'rows' => 8, 'style'=>'outline: none;border:none;transform:skew(-4.96deg);'])->label('') ?>
>>>>>>> a3f31ba2fe6a0a87eb031c1e992e11292306eeaa

</div>
<button class="btn btn-default">Отправить</button><a id="reset-a" href="">Сброс</a>
<script>
    
</script>    
<?php
 
     
     $script = <<< JS
          
      $(function(){
        $('#reset-a').click(function(e){
            $('#hiddeninputcomment').attr({'value':0});
              
             $('#commentform-content').attr({'placeholder':'Написать комментарий'});
                 $('#commentform-content').focus();
                 e.preventDefault();
        });
    });
JS;


            $this->registerJS($script);      
    
   
$form::end();
yii\widgets\Pjax::end();
?>