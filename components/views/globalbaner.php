<?php
use yii\helpers\Url;
if($prioritet):
?>
    <section class="youplay-banner banner-top youplay-banner-parallax">
      <div class="image" style="background-image: url('/imagesgames/<?=$modelgames->globalimag ?>')">
      </div>
   
        
  <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="<?=$modelgames->rating ?> из 10"><span><?=$modelgames->rating ?></span>
              </div>
      <div class="info">
        <div>
          <div class="container">
            <h1><?=$modelgames->namegames ?> <br><?=$modelgames->namegamesdop?></h1>
            <em>"<?=$modelgames->stampgames ?>"</em>
            <br>
            <br>
            <br>
            <a class="btn btn-lg" href="<?= Url::to(['site/games','id'=>$modelgames->id]) ?>">Подробнее</a>
          </div>
        </div>
      </div>
        
    </section>

<?php else: ?>

<div class="image" style="background-image: url('/imagesgames/<?=$modelgames->globalimag ?>')"> </div>

<?php endif; ?>
