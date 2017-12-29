<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = Html::encode($model->namegames);

$this->params['breadcrumbs'][] = ['template' => "<li><b>{link}</b></li>", 'label' => $category->name,
    'url' => ['/site/category','id'=>$model->category_id],];
$this->params['breadcrumbs'][] = Html::encode($model->namegames);
?>
<section class="content-wrap no-banner">
    <style>
        .breadcrumb>li{
             color:#FF8c00;
            
        }
        .breadcrumb{
             background-color: transparent;
        }
        .breadcrumb>li+li::before{
            padding: 0 5px;
            color: #ccc;
            content: "\00bb";
        }
    </style>
    <?php
    echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ?
        $this->params['breadcrumbs'] : [],]);
    ?>
    <h1 class="container"><?= Html::encode($model->namegames) ?> <br>
        <span style="font-size: 20pt;"><?= Html::encode($model->namegamesdop) ?></span>
    </h1>

    <div class="container youplay-news youplay-post">

        <!-- Post Info -->
        <article class="news-one">

            <!-- Post Text -->
            <div class="description">


                <p>
<?= Html::encode($model->stampgames) ?>
                </p>

                <div class="align-center">
                    <a href="/imagesgames/<?= Html::encode($model->globalimag) ?>" class="angled-img image-popup" target="_blank">
                        <div class="img">
                            <img src="/imagesgames/<?= Html::encode($model->globalimag) ?>" alt="no images">
                        </div>
                        <i class="fa icon"><i class="glyphicon glyphicon-zoom-in"></i></i>
                    </a>
                </div>
<?php if ($model->tehnik_trebov): ?>
                    <h3>Технические требования</h3>
                    <p>
    <?= $model->tehnik_trebov ?>
                    </p>

<?php endif; ?> 

                <div class="align-center">
                    <!-- Slider -->

                    <div class="youplay-slider gallery-popup">

<?php foreach ($model->images as $modelContent): ?>
                            <a href="/skringames/<?= $modelContent->images_games ?>" class="angled-img pull-left" target="_blank">
                                <div class="img">
                                    <img src="/skringames/<?= $modelContent->images_games ?>" alt="">
                                </div>
                                <i class="fa icon"><i class="glyphicon glyphicon-zoom-in"></i></i>
                            </a>

<?php endforeach; ?>
                    </div>

                    <!-- /Slider -->
                </div>
<?php if ($model->content): ?>
                    <h3>Об игре</h3>
                    <p>
    <?= $model->content ?>
                    </p>
                    <?php endif; ?>
                <?php if ($model->images): ?>
                    <h3>Все скриншоты</h3>
                    <div class="align-center">
    <?php foreach ($model->images as $modelContent): ?>
                        <a href="/skringames/<?= $modelContent->images_games ?>" class="angled-img image-popup mr-0" target="_blank">
                                <div class="img">
                                    <img src="/skringames/<?= $modelContent->images_games ?>" alt="">
                                </div>
                                <i class="fa icon"><i class="glyphicon glyphicon-zoom-in"></i></i>
                            </a>
    <?php endforeach; ?>

                    </div>
<?php endif; ?>

            </div>
            <!-- /Post Text -->

            <!-- Review Rating -->
            <div class="youplay-review-rating">
                <div class="row">
                    <div class="col-md-4">
                        <div class="youplay-hexagon-rating" data-max="10" title="<?= $model->rating ?> из 10"><span><?= $model->rating ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="mt-0">Good</h3>
                        <ul>
                            <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Дата выхода:</li>
                            <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Жанр:</li>
                            <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Разработчик:</li>
                            <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Тип издания:</li>
                           <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Платформа:</li>
                           <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Язык озвучка:</li>
                           <li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i> Таблетка:</li>

                        </ul>
                    </div>
                  
                </div>
            </div>
            <!-- /Review Rating -->

            <!-- Post Tags -->
            <!--        <div class="tags">
                      <i class="fa fa-tags"></i>  <a href="#">Kingdoms of Amalur</a>, <a href="#">game</a>, <a href="#">review</a>
                    </div>-->
            <!-- /Post Tags -->

            <!-- Post Meta -->
            <!--        <div class="meta">
                      <div class="item">
                        <i class="fa fa-user meta-icon"></i>
                        Author <a href="#!">nK</a>
                      </div>
                      <div class="item">
                        <i class="fa fa-calendar meta-icon"></i>
                        Published <a href="#!">Today</a>
                      </div>
                      <div class="item">
                        <i class="fa fa-bookmark meta-icon"></i>
                        Categories <a href="#!">First Try</a>
                      </div>
                      <div class="item">
                        <i class="fa fa-eye meta-icon"></i>
                        Views 384
                      </div>
                      <div class="item">
                        <a href="#"><i class="fa fa-heart"></i> 13</a>
                      </div>
                    </div>-->
            <!-- /Post Meta -->

            <!-- Post Share -->
            <!--        <div class="btn-group social-list social-likes" data-counters="no">
                      <span class="btn btn-default facebook" title="Share link on Facebook"></span>
                      <span class="btn btn-default twitter" title="Share link on Twitter"></span>
                      <span class="btn btn-default plusone" title="Share link on Google+"></span>
                      <span class="btn btn-default pinterest" title="Share image on Pinterest" data-media=""></span>
                      <span class="btn btn-default vkontakte" title="Share link on VK"></span>
                    </div>-->
            <!-- /Post Share -->
        </article>
        <!-- /Post Info -->

        <!-- Post Comments -->
        <!--      <div class="comments-block">
                <h2>Comments <small>(4)</small></h2>
        
                 Comments List 
                <ul class="comments-list">
                   John Doe comment 
                  <li>
                    <article>
                      <div class="comment-avatar pull-left">
                        <img src="assets/images/avatar-user-2.png" alt="">
                      </div>
                      <div class="comment-cont clearfix">
                        <a class="comment-author h4" href="#!">Timmothy Stevens</a>
                        <div class="date">
                          <i class="fa fa-calendar"></i> December 23, 2014
                          <a href="#!" class="pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                        <div class="comment-text">
                          Ut sibi fuerat socius sagittis. Ego intervenerit. Vere quia a te nuper iratus occidit illos undecim annorum puer?
                        </div>
                      </div>
                    </article>
        
                    <ul class="child-comment">
                       Mike Pearson comment 
                      <li>
                        <article>
                          <div class="comment-avatar pull-left">
                            <img src="assets/images/avatar-user-3.png" alt="">
                          </div>
                          <div class="comment-cont clearfix">
                            <a class="comment-author h4" href="#!">Richard Lambert</a>
                            <div class="date">
                              <i class="fa fa-calendar"></i> January 12, 2015
                              <a href="#!" class="pull-right"><i class="fa fa-reply"></i> Reply</a>
                            </div>
                            <div class="comment-text">
                              Prohibere. Striga! Ut custodiant te sermonem dicens - periculi ... periculo!
                            </div>
                          </div>
                        </article>
        
                        <ul class="child-comment">
                           Mike Pearson comment 
                          <li>
                            <article>
                              <div class="comment-avatar pull-left">
                                <img src="assets/images/avatar-user-4.png" alt="">
                              </div>
                              <div class="comment-cont clearfix">
                                <a class="comment-author h4" href="#!">Clyde Fields</a>
                                <div class="date">
                                  <i class="fa fa-calendar"></i> January 30, 2015
                                  <a href="#!" class="pull-right"><i class="fa fa-reply"></i> Reply</a>
                                </div>
                                <div class="comment-text">
                                  Suarum impotens prohibere eum.
                                </div>
                              </div>
                            </article>
                          </li>
                           /Mike Pearson comment 
                        </ul>
                      </li>
                       /Mike Pearson comment 
                    </ul>
                  </li>
                   /John Doe comment 
        
                   Mike Pearson comment 
                  <li>
                    <article>
                      <div class="comment-avatar pull-left">
                        <img src="assets/images/avatar.png" alt="">
                      </div>
                      <div class="comment-cont clearfix">
                        <a class="comment-author h4" href="#!">Scott Sutton</a>
                        <div class="date">
                          <i class="fa fa-calendar"></i> December 24, 2014
                          <a href="#!" class="pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                        <div class="comment-text">
                          Gus! Est, ante me factus singulis decem gradibus. Et nunc ad aliud opus mihi tandem tollendum est puer ille consensus et nunc fugit.
                        </div>
                      </div>
                    </article>
                  </li>
                   /Mike Pearson comment 
                </ul>
                 /Comments List 
        
                <h2>Leave a Reply</h2>
                 Comment Form 
                <form action="#!" class="comment-form">
                  <div class="comment-cont clearfix">
                    <div class="youplay-input">
                      <input type="text" name="username" placeholder="Your Name *">
                    </div>
                    <div class="youplay-input">
                      <input type="email" name="email" placeholder="Your Email *">
                    </div>
                    <div class="youplay-textarea">
                      <textarea name="message" rows="5" placeholder="Your Comment..."></textarea>
                    </div>
                    <button class="btn btn-default pull-right">Submit</button>
                  </div>
                </form>
                 /Comment Form 
              </div>
               /Post Comments -->

    </div>


</section>
<?php
// endforeach;?>