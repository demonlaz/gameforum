<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty(Yii::$app->user->identity->profile->name) ? Html::encode(Yii::$app->user->identity->username) : 
    Html::encode(Yii::$app->user->identity->profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Main Content -->
<section class="content-wrap">

    <!-- Banner -->
     <?= $this->render('/user/settings/_menu') ?>
    <!-- /Banner -->



    <!-- Information -->
    <div class="requirements-block">
        <div class="col-md-9">
            <ul class="pagination pagination-sm mt-0">
                <li class="active" id="countMess">
                    <a href="<?= yii\helpers\Url::to(['/profile/messages']) ?>">Почтовый ящик</a>
                </li>
                <li>
                    <a id="dialogSendA" href="">Написать</a>
                </li>
            </ul>
        </div>
        <h2 >У вас новых сообщений <?= $fullCount ?> <span class="messages-count"></span> </h2>
        
        <?php 
        
//        $str="privet moii svet kUda Poper";
        
//       $res= strtolower(str_replace(' ', '-', $str));
//       
//        echo $res;
        
        ?> 
        <div class="panel-group youplay-accordion" id="accordion" role="tablist" aria-multiselectable="false">

            <?php
            $for = 0;
            foreach ($modelMessagesLogin as $loginFrom):
                ?>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne<?= $loginFrom->loginFrom ?>">

                        <h4 class="panel-title">
                            <a data-toggle="collapse"
                               data-parent="#accordion"
                               href="#collapseOne<?= $loginFrom->loginFrom ?>" 
                               aria-expanded="true"
                               aria-controls="collapseOne<?= $loginFrom->loginFrom ?>"
                               value="<?= $loginFrom->loginFrom ?>"
                               >
                                   <?= $loginFrom->loginFrom ?> 
                                <span class="messages-count">

                                    <?php
                                    //(($modelMessagesCount[$for]['loginFrom']) == $loginFrom->loginFrom) ? " " . $modelMessagesCount[$for]['countLoginFrom'] : '' 
                                    foreach ($modelMessagesCount as $countMessage):
                                        echo ($countMessage['loginFrom'] == $loginFrom->loginFrom) ? '<i class="glyphicon glyphicon-envelope"> </i>' . " " . $countMessage['countLoginFrom'] . '+' : '';
                                    endforeach;
                                    ?></span> 
                                <span class="icon-plus"></span>


                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne<?= $loginFrom->loginFrom ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?= $loginFrom->loginFrom ?>">
                        <div class="panel-body">



                            <table class="youplay-messages table table-hover">
                                <style>
                                    #trash{
                                        float:right;display:block;
                                    }
                                    </style>
                                <tbody>
                                    <?php
            
                                    
                                  $formD=yii\widgets\ActiveForm::begin(['method'=>"POST",'action'=>'/profile/remove-messages','options'=>['style'=>'display:block;']]);
                                 echo  $formD->field($formDelet, 'hiddenInpu')->hiddenInput(['value'=>$loginFrom->loginFrom])->label('');
                                 
                                  echo  Html::submitButton('<i class="glyphicon glyphicon-trash"> </i>',
                                          ['style'=>'background:red;color:white;border:none;float:right;margin-bottom:5px;',
                                              'type'=>'submit',
//                                              'data-confirm'=>'Вы уверенны что хотите удалить всю переписку?'
                                              ]);
                                           
                                  
                                           $formD::end(); ?>


                                    
                                

                                <?php
                                foreach ($modelMessagesContent as $content):
                                    if ($content['loginFrom'] == $loginFrom->loginFrom):
                                        ?>

                                        <tr>
                                            <td class="message-from">
                                                <!--                                                <a href="#" class="angled-img">
                                                                                                    <div class="img">
                                                                                                       
                                                                                                        <img src="" width="80" height="80" alt="">
                                                                                                    </div>
                                                                                                </a>-->

                                                <a href="#" class="message-from-name" title="<?= $content['loginFrom'] ?>"
                                                   ><?= Html::encode($content['loginFrom']) ?>
                                                </a>
            <?= ($content['readContent'] == 0) ? "(Нов!)" : "" ?>
                                                <br>
                                                <span class="date"><?= Yii::$app->formatter->asDatetime($content['date_add']) ?></span>
                                            </td>
                                            <td class="message-description">
                                                <!--<a href="#" class="message-description-name" title="View Message"></a>-->
                                                <br>
                                                <div class="message-excerpt"><?= Html::encode($content['content']) ?></div>
                                            </td>
                                            <td class="message-action">
                                                <!--<a class="message-delete" href="#"></a>-->
                                            </td>
                                        </tr>


                                        <?php
                                    endif;
                                endforeach;
                                ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>


                <?php
            endforeach;
            ?>
            <div id="dial" style="display:none; background-image:url(<?= app\components\GlobalBanerWidget::widget(['url' => true]) ?>)">

<?= app\components\SendFormMessagesWidget::widget(['urlSend'=>'/profile/messages-send']) ?>

            </div>


            <?php
            // endforeach; 
            $urlAjax = yii\helpers\Url::to(['/profile/read-content-ajax']);
            $statusAjax = \app\components\FullCountMessagesWIdget::widget();
            $script = <<< JS
  $(function(){
                   var statusAjaxMessage=$statusAjax;
                    if(statusAjaxMessage>0){
        $("[aria-expanded=true]").click(function(e){
        var value=$(this).attr('value');
            
      $.ajax({
               //method:"GET"
                url:"$urlAjax",
                data:{'status':'true','name':value},
                
                success:function(data){
                   
                    $('.messages-count').text(' ');
                   
                    $('#countMess').text(data);
                    $('h2').text('У вас новых сообщений '+data);
                    $('span#countMess').text(data);
           
                    
                    
                    
                    },
            });//конец ajax


        });//конец события collapsed
                    } // конец if
                    
                  
  
                    
                 
    });//конец глобал
     
JS;


            $this->registerJS($script);
            ?>
        </div>
    </div>
    <!-- /Information -->

    <script>

    </script>


</section>
<!-- /Main Content -->
