<?php
use yii\helpers\Url;

?>
   <div class="youplay-carousel" data-autoplay="5000">
       <?php foreach ($model as $v): ?>
       <a class="angled-img" href="<?= Url::to(['/site/games','id'=>$v['id']])?>">
           <div class="img" style="min-height: 180px">
               <img src="/imagesgames/<?=$v['globalimag']?>" alt="no images" style="min-height:180px;">
        </div>
        <div class="over-info">
          <div>
            <div>
              <h4><?=$v['namegames']?></h4>
              <div class="rating">
                    <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title=" <?=$v['rating']?> из 10"><span>
               <?=$v['rating']?></span>
              </div>
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
