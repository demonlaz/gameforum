<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */
$this->title = Yii::$app->user->identity->username;
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Main Content -->
<section class="content-wrap">

    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <?= \app\components\GlobalBanerWidget::widget(['prioritet' => false]) ?>

        <div class="youplay-user-navigation">
            <div class="container">
                <ul>
                    <!--<li><a href="user-activity.html">Activity</a>-->
                    </li>
                    <li ><a href="<?= \yii\helpers\Url::to(['/user/profile']); ?>">Профиль</a>
                    </li>
                    <li class="active" ><a href="<?= \yii\helpers\Url::to(['/profile/messages']); ?>">Сообщения <span class="badge"><?= $fullCount ?></span></a>
                    </li>
                    <!--<li><a href="user-settings.html">Settings</a>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>

        <div class="info">
            <div>
                <div class="container youplay-user">

                    <!--            <a href="assets/images/user-photo.jpg" class="angled-img image-popup">
                                  <div class="img">
                                    <img src="assets/images/user-avatar.jpg" alt="">
                                  </div>
                                  <i class="fa fa-search-plus icon"></i>
                                </a>-->
                    <!--
                    -->
                    <div class="user-data">
                        <h2><?= Html::encode(Yii::$app->user->identity->username) ?></h2>
                        <div class="location"><i class="f"><i class="glyphicon glyphicon-map-marker"></i></i> <?= (Html::encode(Yii::$app->user->identity->profile->location)) ? Html::encode(Yii::$app->user->identity->profile->location) : 'Не известно' ?></div>
                        <div class="activity">
                            <div>
                                <div class="num">69</div>
                                <div class="title">Posts</div>
                            </div>
                            <div>
                                <div class="num">12</div>
                                <div class="title">Games</div>
                            </div>
                            <div>
                                <div class="num">689</div>
                                <div class="title">Followers</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-20">
                    <a href="#!" class="btn btn-sm btn-default ml-0">Add Friend</a>
                    <a href="#!" class="btn btn-sm btn-default">Private Message</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <?php
//echo "<pre>";
//print_r($modelMessagesCount);
//{
// echo $modelMessagesCount[0]['loginFrom'];
//};
//echo "</pre>";
//echo $modelMessagesCount;
    ?>


    <!-- Information -->
    <div class="requirements-block">
        <div class="col-md-9">
            <ul class="pagination pagination-sm mt-0">
                <li class="active">
                    <a href="<?= yii\helpers\Url::to(['/profile/messages']) ?>">Почтовый ящик</a>
                </li>
                <li>
                    <a id="dialogSendA" href="">Написать</a>
                </li>
            </ul>
        </div>
        <h2>У вас новых сообщений <?= $fullCount ?> <span class="messages-count"></span> </h2>

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
                                <tbody>

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
            <div id="dial" style="display:none; background-image:url(<?= app\components\GlobalBanerWidget::widget(['url'=>true])?>)">

             <?= app\components\SendFormMessagesWidget::widget()?>

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
                   // alert(data);
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
