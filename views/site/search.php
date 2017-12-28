<?php
use yii\helpers\Url;
$this->beginBlock('search');
$this->endBlock();
$this->title='Поиск';
?>

<!-- Main Content -->
<section class="content-wrap">

    <!-- Banner -->
    <div class="youplay-banner youplay-banner-parallax banner-top xsmall">
<?= \app\components\GlobalBanerWidget::widget() ?>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Поиск</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->


    <div class="container youplay-search">
        
        <form method="GET">
        <div class="youplay-input">
                      <input type="text" name="search" placeholder="Найти..." autofocus>
        </div>
        </form>
        
        <div class="row">
            <div class="col-md-6">
                <h2>Игры</h2>
           <?php                foreach ($modelsGames as $modelGames): ?>
                <!-- Single Product Block -->
                <a href="<?= Url::to(['/site/games','id'=>$modelGames['id']])?>" class="angled-bg">
                    <div class="row">
                        <div class="col-md-3 col-xs-4">
                            <div class="angled-img">
                                <div class="img">
                                    <img src="/imagesgames/<?=$modelGames['globalimag']?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-8">
                            <div class="row">
                                <div class="col-xs-6 col-md-9">
                                    <h4><?=$modelGames['namegames']?></h4><span><?=$modelGames['namegamesdop'] ?></span>
                                    <div class="rating" style="float:right;position: relative;top: -41px; right: -124px;">
                                  <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title=" <?=$modelGames['rating']?> из 10"><span>
               <?=$modelGames['rating']?></span>
              </div>
                                    </div>
                                   
                                </div>
                                <div class="col-xs-6 col-md-3 align-right">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- /Single Product Block -->
<?php endforeach; ?>
               
                <!-- /Single Product Block -->
            </div>
            <div class="col-md-6">
                <h2>Новости</h2>

                <!-- Single News -->
                <a href="#!" class="angled-bg">
                    <div class="row">
                        <div class="col-md-3 col-xs-4">
                            <div class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-bloodborne-500x375.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-8">
                            <div class="row">
                                <div class="col-xs-6 col-md-9">
                                    <h4>Bloodborne - First Try!</h4>
                                    <div class="tags">
                                        <i class="fa fa-tags"></i> Bloodborne, first try, first boss problem, newbie game
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-3 align-right">
                                    <div class="date">
                                        <i class="fa fa-calendar"></i> Today
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- /Single News -->

              
            </div>
        </div>


    </div>

 
