<?php
/* @var $this yii\web\View */

use \yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Архив новостей"
?>

<section class="content-wrap">

    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <?= app\components\GlobalBanerWidget::widget() ?>

        <div class="info">
            <div>
                <div class="container">
                    <h1><?= $this->title ?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->


    <div class="container youplay-news">

        <!-- News List -->
        <div class="col-md-9 col-md-push-3">

            <?php foreach ($modelFullNews as $news): ?>  
                <?php foreach ($news->games as $games): ?>  
                    <!-- Single News Block -->
                    <div class="news-one">
                        <div class="row vertical-gutter">
                            <div class="col-md-4">
                                <a href="<?= Url::to(['/news/post', 'id' => $news->id]) ?>" class="angled-img">
                                    <div class="img">
                                        <img src="/imagesgames/<?=$games->globalimag?>" alt="" height="200px">
                                    </div>
                                    <div class="over-info bottom h4"><?=\Yii::$app->formatter->asDate($news->date_add)?></div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="clearfix">
                                    <h3 class="h2 pull-left m-0"><a href="<?= Url::to(['/news/post', 'id' => $news->id]) ?>"><?=$news->title?></a></h3>
                                </div>
                                <div class="tags">
                                    <i class="glyphicon glyphicon-eye-open"></i>  <a href="<?= Url::to(['/site/games', 'id' => $games->id]) ?>"><?=$games->namegames?></a>
                                </div>
                                <div class="description">
                                  <?=$news->content_short?>
                                </div>
                                <a href="<?= Url::to(['/news/post', 'id' => $news->id]) ?>" class="btn read-more pull-left">Подробние</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Single News Block -->

                <?php endforeach;
            endforeach; ?>

                    
                    <?=\yii\widgets\LinkPager::widget(['pagination'=>$paginations,'options'=>['class'=>'pagination']]) ?>
                    
 
     </div>
        <!-- /News List -->

        <!-- Left Side -->
        <div class="col-md-3 col-md-pull-9">

         

            <!-- Side Categories -->
            <div class="side-block">
                <h4 class="block-title">Категория игры</h4>
                <ul class="block-content">
                    <?= \app\components\CategoryWidget::widget(['li'=>true])?>
                </ul>
            </div>
            <!-- /Side Categories -->

            <!-- Side Popular News -->
<!--            <div class="side-block">
                <h4 class="block-title">Popular News</h4>
                <div class="block-content p-0">
                     Single News Block 
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="blog-post-1.html" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-bloodborne-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="blog-post-1.html" title="Bloodborne - First Try!">Bloodborne - First Try!</a></h4>
                            <span class="date"><i class="fa fa-calendar"></i> Today</span>
                        </div>
                    </div>
                     /Single News Block 

                     Single News Block 
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="#!" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-middle-eart-shadow-of-mordor-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="#!" title="Whats New in Middle-earth">Whats New in Middle-earth</a></h4>
                            <span class="date"><i class="fa fa-calendar"></i> February 2, 2015</span>
                        </div>
                    </div>
                     /Single News Block 

                     Single News Block 
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="#!" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-diablo-iii-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="#!" title="Let's Grind Diablo III">Let's Grind Diablo III</a></h4>
                            <span class="date"><i class="fa fa-calendar"></i> January 18, 2015</span>
                        </div>
                    </div>
                     /Single News Block 
                </div>
            </div>
             /Side Popular News 

             Our Twitter 
            <div class="side-block">
                <h4 class="block-title">Our Twitter</h4>
                <div class="block-content">
                    <div class="youplay-twitter" data-twitter-user-name="nkdevv" data-twitter-count="3" data-twitter-hide-replies="false"></div>
                </div>
            </div>-->
            <!-- /Our Twitter -->

        </div>
        <!-- /Left Side -->

    </div>





</section>