<?php
use yii\widgets\ActiveForm;
?>
 <style>
        #searchform-search{
       
    height: 19px;
        background: rgba(8,3,37,.4);
        color: whitesmoke;
  

}

        
        </style>
<div style="height: 20px;">
    <?php
    $form= ActiveForm::begin(['options'=>['style'=>'margin:0;height:20px;width:50%']]);
?>

<?=$form->field($model, 'search')->input('text',['options'=>['style'=>'margin:0;height:20px;'],'placeholder'=>"Найти"])->label('');?>
   
    <?php
ActiveForm::end();


?>
</div>