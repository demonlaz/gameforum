<?php 

$this->title= \yii\helpers\Html::encode($modelNews->title);
foreach ($modelNews->games as $games): 
?>


    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
      <div class="image" style="background-image: url('/imagesgames/<?=$games->globalimag?>')">
      </div>

      <div class="info">
        <div>
          <div class="container">
            <h1><?=$this->title?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /Banner -->


 <div class="container youplay-news youplay-post">
              

      <div class="col-md-9">
        <!-- Post Info -->
        <article class="news-one">

          <!-- Post Text -->
          <div class="description">
              <a href="<?= \yii\helpers\Url::to(['/site/games','id'=>$games->id])?>" class="angled-img pull-left video-popup" target="_blank">
                  <div class="img" style="background:none;">
                  <img src="/imagesgames/<?=$games->globalimag?>" alt="" width="400" height="300">
              </div>
              <!--<i class="fa fa-play icon"></i>-->
            </a>
           <?=$modelNews->content ?>
                 
          </div>
          <!-- /Post Text -->

          <!-- Review Rating -->
          <div class="youplay-review-rating">
            <div class="row">
              <div class="col-md-4">
                  <div class="youplay-hexagon-rating" data-max="10" title="<?=$games->rating?> из 10"><span><?=$games->rating?></span>
                </div>
              </div>
<!--              <div class="col-md-4">
                <h3 class="mt-0">Good</h3>
                <ul>
                  <li><i class="fa fa-plus-circle"></i> Incredible atmosphere</li>
                  <li><i class="fa fa-plus-circle"></i> Fast, tactical combat</li>
                  <li><i class="fa fa-plus-circle"></i> Multiplayer with friends</li>
                  <li><i class="fa fa-plus-circle"></i> Creature/Boss design</li>
                </ul>
              </div>-->
<!--              <div class="col-md-4">
                <h3 class="mt-0">Bad</h3>
                <ul>
                  <li><i class="fa fa-minus-circle"></i> Aimlessness in goals</li>
                  <li><i class="fa fa-minus-circle"></i> Lack of play style choice</li>
                </ul>
              </div>-->
            </div>
          </div>
          <!-- /Review Rating -->
        </article>
        <!-- /Post Info -->

        <!-- Post Comments -->
        <div class="comments-block">
          <!--<h2>Comments <small>(2)</small></h2>-->

          <!-- Comments List -->
          <!-- /Comments List -->

          <!--<h2>Leave a Reply</h2>-->
          <!-- Comment Form -->
        
          <!-- /Comment Form -->
        </div>
        <!-- /Post Comments -->
      </div>

      <!-- Right Side -->
      <div class="col-md-3">

        <!-- Side Popular News -->
        <div class="side-block">
          <h4 class="block-title">Последние новости</h4>
          <div class="block-content p-0">
            
              
              
              <?= \app\components\NewsWidget::widget(['sidbar'=>true])?>
              
              
              
          </div>
        </div>
        <!-- /Side Popular News -->

        <!-- Side Categories -->
        <div class="side-block">
          <h4 class="block-title">Категория игры</h4>
          <ul class="block-content">
           <?= \app\components\CategoryWidget::widget(['li'=>true])?>
          </ul>
        </div>
        <!-- /Side Categories -->

       

      </div>
      <!-- /Right Side -->
             <?php endforeach;?>

    </div>