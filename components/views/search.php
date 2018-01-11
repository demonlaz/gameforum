<?php
use yii\widgets\ActiveForm;
 
?>
 <style>
        #searchform-search{
       
    height: 19px;
        background: rgba(8,3,37,.4);
        color: whitesmoke;
  color:#3C0732;

}

        
        </style>
<div style="height: 20px;">
    <?php
 
    $form= ActiveForm::begin(['options'=>['style'=>'margin:0;height:20px;width:50%']]);
?>

<?= $form->field($model, 'search')->widget(\yii\jui\AutoComplete::classname(), [
    'clientOptions' => [
        'source' =>$arrAutiComplete,
    ],'options'=>['style'=>'margin:0;height:20px;border-radius:10px;padding:10%;width:100%;outline: none;color:white;', 'placeholder'=>"Найти"],
//    'placeholder'=>"Найти",
    
])->label(''); ?>
    
<?php //$form->field($model, 'search')->input('text',['options'=>['style'=>'margin:0;height:20px;'],'placeholder'=>"Найти"])->label('');?>

   
    <?php
ActiveForm::end();


?>
</div>