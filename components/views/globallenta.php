<?php
use yii\helpers\Url;

?>
   <div class="youplay-carousel" data-autoplay="5000">
       <?php foreach ($model as $v): ?>
       <a class="angled-img" href="<?= Url::to(['/site/games','id'=>$v['id']])?>">
        <div class="img">
            <img src="/imagesgames/<?=$v['globalimag']?>" alt="no images">
        </div>
        <div class="over-info">
          <div>
            <div>
              <h4><?=$v['namegames']?></h4>
              <div class="rating">
<!--                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>-->
              </div>
            </div>
          </div>
        </div>
      </a>
   <?php endforeach; ?>   
    </div>
