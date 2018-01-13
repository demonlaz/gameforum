<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$modelComments;
$modelCommentsReply;
//print_r();
?>

<!-- Post Comments -->
<div class="comments-block">
    <h2>Комментарии <small>(<?=$countComments?>)</small></h2>

    <!-- Comments List -->
    <ul class="comments-list">
        <!-- John Doe comment -->
<?php foreach ($modelComments as $globalComments): ?>
            <li>
                <article>
                    <div class="comment-avatar pull-left">
                      <!--<img src="assets/images/avatar-user-2.png" alt="">-->
                    </div>
                    <div class="comment-cont clearfix">
                        <a class="comment-author h4" href="#!"><?= Html::encode($globalComments['login']) ?></a>
                        <div class="date">
                            <i class="glyphicon glyphicon-calendar"></i> <?= Yii::$app->formatter->asDatetime($globalComments['date_add']) ?>
                            <a id="send-comment" href="#!" class="pull-right" date-comment="<?=$globalComments['id']?>"><i class="glyphicon glyphicon-repeat"></i> Ответить</a>
                        </div>
                        <div class="comment-text">
    <?= Html::encode($globalComments['content']) ?>
                        </div>
                    </div>
                </article>
                <?php
               
                foreach ($modelCommentsReply as $modelCommentsReplys):
                    if ($globalComments['id'] == $modelCommentsReplys['reply']):
                        ?>
                            <ul class="child-comment">
                    <!-- Mike Pearson comment -->
                    <li>
                        <article>
                            <div class="comment-avatar pull-left">
                                <!--<img src="assets/images/avatar-user-3.png" alt="">-->
                            </div>
                            <div class="comment-cont clearfix">
                                <a class="comment-author h4" href="#!"><?=Html::encode($modelCommentsReplys['login'])?></a>
                                <div class="date">
                                    <i class="glyphicon glyphicon-calendar"></i> <?=Yii::$app->formatter->asDatetime($modelCommentsReplys['date_add'])?>
                                    <!--<a href="#!" class="pull-right"><i class="fa fa-reply"></i> Reply</a>-->
                                </div>
                                <div class="comment-text">
                                    <?=Html::encode($modelCommentsReplys['content'])?>
                                </div>
                            </div>
                        </article>

                     
                    </li>
                    <!-- /Mike Pearson comment -->
                </ul>
                        <?php
                    endif;
                endforeach;
                ?>
            
            </li>
<?php endforeach; ?>
        <!-- /John Doe comment -->

      
    </ul>
    <!-- /Comments List -->



 
</div>
<?= \yii\widgets\LinkPager::widget([
     'pagination' => $pagination, ]) ?>
<!-- /Post Comments -->

    
    <?php 
     
     $script = <<< JS
               $(function(){
          $('a#send-comment').on('click',function(){
              
             
             $('#hiddeninputcomment').val($(this).attr('date-comment'));
             $('#commentform-content').focus();
             $('#commentform-content').attr({'placeholder':'Теперь вы можете ответить автору комментария,или обновить стеринцу для написания собственного коммента'});
          });
      });
    
JS;


            $this->registerJS($script);      
    
    ?>