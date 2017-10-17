<?php

if($prioritet):
?>
    <section class="youplay-banner banner-top youplay-banner-parallax">
      <div class="image" style="background-image: url('/imagesgames/<?=$modelgames->globalimag ?>')">
      </div>

      <div class="info">
        <div>
          <div class="container">
            <h1><?=$modelgames->namegames ?> <br>Reaper of Souls</h1>
            <em>"One of the best grind games"</em>
            <br>
            <br>
            <br>
            <a class="btn btn-lg" href="#!">Purchase</a>
          </div>
        </div>
      </div>
    </section>

<?php else: ?>

<div class="image" style="background-image: url('/imagesgames/<?=$modelgames->globalimag ?>')"> </div>

<?php endif; ?>
