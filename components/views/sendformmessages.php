<?php
use yii\bootstrap\ActiveForm;

yii\widgets\Pjax::begin(['id'=>'sdfdf','timeout'=>7000,'enablePushState'=>false]);
if($error==true){
    echo "<span style='color:red;'>Сообщение не было отправленно проверьте логин!</span>";
}
if($send==true){echo "<span style='color:green;'>Сообщение отправленно!</span>";}
$form = ActiveForm::begin([
          'method' => 'post',
          'action' => [$urlSend],
          'options'=>['data-pjax'=>true,'style'=>'color:white;font-size:16px;']
      ]);
$options=['style'=>"color:white;"]

?>
  
                    <div class="youplay-input">
                        <?=$form->field($modelForm, 'loginTo')->input('text', ['placeholder'=>"Кому",'options'=>$options])->label('')?>
                        
                    </div>
                    
                    <div class="youplay-textarea">
                         <?=$form->field($modelForm, 'content')->textarea( ['placeholder'=>"Сообщение",'rows'=>8])->label('')?>
                        
                    </div>
                    <button class="btn btn-default">Отправить</button>
          
<?php
$form::end();
yii\widgets\Pjax::end();

?>