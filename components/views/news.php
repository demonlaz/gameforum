<?php
use yii\helpers\Url;
?>
<h2 class="container h1">Новости недели!</h2>
<?php
foreach ($model as $news) :
  
    foreach ($news->games as $games):
?>
 
    <section class="youplay-news container">
      <!-- Single News Block -->
      <div class="news-one">
        <div class="row vertical-gutter">
          <div class="col-md-4">
            <a href="<?=Url::to(['/news/post','id'=>$news->id])?>" class="angled-img">
              <div class="img">
                  <img src="/imagesgames/<?=$games->globalimag?>" alt="" height="200px">
              </div>
              <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="<?=$games->rating?> из 10"><span><?=$games->rating?></span>
              </div>
            </a>
          </div>
          <div class="col-md-8">
            <div class="clearfix">
              <h3 class="h2 pull-left m-0"><a href="<?=Url::to(['/news/post','id'=>$news->id])?>"><?=$news->title?></a></h3>
              <?php Yii::$app->formatter->locale='ru-RU' ?>
              <span class="date pull-right"><span class="glyphicon glyphicon-calendar"></span>  <?= Yii::$app->formatter->asDate($news->date_up)?></span>
            </div>
            <div class="tags">
              <!--<i class="fa fa-tags"></i>  <a href="#">Bloodborne</a>, <a href="#">first try</a>, <a href="#">first boss problem</a>, <a href="#">newbie game</a>-->
            </div>
            <div class="description">
                <h4></h4>
              <p>
                 <?=$news->content_short?> 
              </p>
            </div>
            <a href="<?=Url::to(['/news/post','id'=>$news->id])?>" class="btn read-more pull-left">Подробнее</a>
            <a href="<?=Url::to(['/site/games','id'=>$games->id])?>" class="btn read-more pull-left">Об игре</a>
          </div>
        </div>
      </div>
<?php endforeach; 
endforeach;
?>
      <p></p>