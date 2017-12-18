<?php $this->title= yii\bootstrap\Html::encode($modelCategoryName->name) ?>
<!-- Banner -->
<?= \app\components\GlobalBanerWidget::widget(['prioritet' => true]) ?>
<!-- /Banner -->
<?php     use yii\helpers\Html;
 $this->params['breadcrumbs'][] = Html::encode($modelCategoryName->name);

?>

<div class="container youplay-news news-grid">
    <!-- News List -->
    <div class="row vertical-gutter multi-columns-row">
        <?php foreach ($model as $modelContents): ?>
            <!-- Single News Block -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="news-one">
                    <a href="<?= \yii\helpers\Url::to(['/site/games', 'id' => $modelContents->id]) ?>" class="angled-img">
                        <div class="img img-offset">
                            <img src="/imagesgames/<?= $modelContents->globalimag ?>" alt="нет картинки">
                        </div>
                        <div class="bottom-info align-center">
                            <h3><?= $modelContents->namegames ?></h3>
                            <h6><?= $modelContents->namegamesdop ?></h6>
                            <span class="date pull-left">Дата выхода   <span class="glyphicon glyphicon-calendar"></span> 
                                <?= ($modelContents->date_exit) ? Yii::$app->formatter->asDate($modelContents->date_exit) : 'Не известно' ?></span>

                        </div>
                    </a>
                </div>
            </div>
            <!-- /Single News Block -->


        <?php endforeach; ?>

    </div>
    <!-- /Single News Block -->


    <div style="display:block;margin: 0 auto;width: 30%; ">
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $paginations,
        ]);
        ?>
    </div>
</div>
<!-- /News List -->

