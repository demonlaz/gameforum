<?php

/* @var $this yii\web\View */
use app\components\GlobalBanerWidget;
$this->title = 'Геймер';
?>

    <!-- Banner -->
<?= GlobalBanerWidget::widget(['prioritet'=>true]) ?>
    <!-- /Banner -->

    
    <!-- Images With Text -->
 <?= app\components\GlobalLentaWidget::widget(['global'=>true]) ?>
    <!-- /Images With Text -->



    <!-- Popular -->
    <h2 class="container h1">Популярные</h2>
        <!--<h2 class="container h1">Популярные<a href="#!" class="btn pull-right">See More</a></h2>-->

    <?=app\components\GlobalLentaWidget::widget(['popular'=>true]) ?>


    <!-- Specials -->
<!--    <h2 class="container h1">Specials <a href="#!" class="btn pull-right">See More</a></h2>
    <div class="youplay-carousel">
      <a class="angled-img" href="#!">
        <div class="img img-offset">
          <img src="/images/game-dark-souls-ii-500x375.jpg" alt="">
          <div class="badge bg-default">
            -20%
          </div>
        </div>
        <div class="bottom-info">
          <h4>Dark Souls II</h4>
          <div class="row">
            <div class="col-xs-6">
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="price">$39.99 <sup><del>$49.99</del></sup>
              </div>
            </div>
          </div>
        </div>
    
      
      </a>
    </div>-->
    <!-- /Specials -->


    <!-- Preorder -->
<!--    <div class="h2"></div>
    <section class="youplay-banner youplay-banner-parallax small">
      <div class="image" style="background-image: url('/images/banner-witcher-3.jpg');">
      </div>

      <div class="info container align-center">
        <div>
          <h2>The Witcher 3:<br> Wild Hunt</h2>

           See countdown init in bottom of the page 
          <div class="countdown h2" data-end="2017/01/01"></div>

          <br>
          <br>
          <a class="btn btn-lg" href="#!">Pre-Order</a>
        </div>
      </div>
    </section>-->
    <!-- /Preorder -->


    <!-- Latest News -->
   <?= \app\components\NewsWidget::widget()?>
      <!-- /Single News Block -->

    
      <!-- /Single News Block -->
 
    <!-- /Latest News -->


    <!-- Partners -->
    
    <!-- /Partners -->


    <!-- Features -->
<!--    <h2 class="container h1">Why Buy from Us</h2>
    <section class="youplay-features container">
      <div class="col-md-3 col-sm-6">
        <a class="feature angled-bg" href="#">
          <i class="fa fa-cc-visa"></i>
          <h3>Payment</h3>
          <small>More than 10 payment systems</small>
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature angled-bg">
          <i class="fa fa-gamepad"></i>
          <h3>Games</h3>
          <small>A large number of games</small>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature angled-bg">
          <i class="fa fa-money"></i>
          <h3>Cheap</h3>
          <small>Lowest prices on the Internet</small>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature angled-bg">
          <i class="fa fa-users"></i>
          <h3>Community</h3>
          <small>The largest gaming community</small>
        </div>
      </div>
    </section>-->
