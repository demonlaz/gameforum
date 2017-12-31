<?php
/* @var $this yii\web\View */

use \yii\helpers\Url;
use yii\helpers\Html;

$this->title = "Все новости"
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
                                    <i class="fa fa-tags"></i>  <a href="#">Dark Souls II</a>, <a href="#">coming soon</a>, <a href="#">first review</a>, <a href="#">sale date</a>
                                </div>
                                <div class="description">
                                    Ille vivere. Ut ad te quaerebam ... purgare caeli. Sunt uh ... nonnullus propter errorem qui de rebus inter nos et iacere puto suus in causa, id est in mensa. Levir meus, priusquam oppugnarent tempus quis, admonere dicitur. Credo quod idem mihi praesidium.
                                </div>
                                <a href="blog-post-2.html" class="btn read-more pull-left">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Single News Block -->

                <?php endforeach;
            endforeach; ?>

                    
                    <?=\yii\widgets\LinkPager::widget(['pagination'=>$paginations,'options'=>['class'=>'pagination']]) ?>
                    
            <!-- Pagination -->
<!--            <ul class="pagination">
                <li class="active"><a href="#!">1</a>
                </li>
                <li><a href="#!">2</a>
                </li>
                <li><a href="#!">3</a>
                </li>
                <li><a href="#!">4</a>
                </li>
                <li><a href="#!">Next</a>
                </li>
            </ul>
             /Pagination 
        --></div>
        <!-- /News List -->

        <!-- Left Side -->
        <div class="col-md-3 col-md-pull-9">

         

            <!-- Side Categories -->
            <div class="side-block">
                <h4 class="block-title">Categories</h4>
                <ul class="block-content">
                    <?= \app\components\CategoryWidget::widget(['items' => 5,'li'=>true])?>
                </ul>
            </div>
            <!-- /Side Categories -->

            <!-- Side Popular News -->
            <div class="side-block">
                <h4 class="block-title">Popular News</h4>
                <div class="block-content p-0">
                    <!-- Single News Block -->
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
                    <!-- /Single News Block -->

                    <!-- Single News Block -->
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
                    <!-- /Single News Block -->

                    <!-- Single News Block -->
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
                    <!-- /Single News Block -->
                </div>
            </div>
            <!-- /Side Popular News -->

            <!-- Our Twitter -->
            <div class="side-block">
                <h4 class="block-title">Our Twitter</h4>
                <div class="block-content">
                    <div class="youplay-twitter" data-twitter-user-name="nkdevv" data-twitter-count="3" data-twitter-hide-replies="false"></div>
                </div>
            </div>
            <!-- /Our Twitter -->

        </div>
        <!-- /Left Side -->

    </div>





</section>