<?php

use yii\helpers\Url;

$this->beginBlock('search');
$this->endBlock();
$this->title = 'Поиск';
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

<!--        <form method="GET">
            <div class="youplay-input">
                <input type="text" name="search" placeholder="Найти..." autofocus>
            </div>
        </form>-->
 <?php
 
    $form= \yii\bootstrap\ActiveForm::begin(['options'=>[]]);
?>
        <div class="youplay-input">
<?= $form->field($model, 'search')->widget(\yii\jui\AutoComplete::classname(), [
    'clientOptions' => [
        'source' =>$autoCompleteArr,
    ],'options'=>['placeholder'=>"Найти..."],

    
])->label(''); ?>
        </div>
        <?php $form::end();
 
        ?>
        <div class="row">
            <div class="col-md-6">
                <h2>Игры</h2>
                <?php foreach ($modelsGames as $modelGames): ?>
                    <!-- Single Product Block -->
                    <a href="<?= Url::to(['/site/games', 'id' => $modelGames['id']]) ?>" class="angled-bg">
                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <div class="angled-img">
                                    <div class="img">
                                        <img src="/imagesgames/<?= $modelGames['globalimag'] ?>" alt="not images" height="100px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <div class="row">
                                    <div class="col-xs-6 col-md-9">
                                        <h4><?= $modelGames['namegames'] ?></h4><span><?= $modelGames['namegamesdop'] ?></span>
                                        <div class="rating" style="float:right;position: relative;top: -41px; right: -124px;">
                                            <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title=" <?= $modelGames['rating'] ?> из 10"><span>
                                                    <?= $modelGames['rating'] ?></span>
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
                <?php foreach ($modelsNews as $modelNews): ?>
                    <!-- Single News -->
                    <a href="<?= Url::to(['/news/post','id'=>$modelNews->id])?>" class="angled-bg">
                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <div class="angled-img">
                                    <div class="img">
                                        <?php // foreach ($modelNews->games as $games): ?>

                                            <img src="/imagesgames/<?= $modelNews->games->globalimag ?>" alt="not images"  height="120px">
                                        <?php // endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <div class="row">
                                    <div class="col-xs-6 col-md-9">
                                        <h4><?= $modelNews->title ?></h4>
                                        <div class="tags">
                                            <?=$modelNews->content_short?>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-3 align-right">
                                        <div class="date">
                                            <span class="date pull-right"><span class="glyphicon glyphicon-calendar"></span>  <?= Yii::$app->formatter->asDate($modelNews->date_up,'d.M.y') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- /Single News -->
                <?php endforeach; ?>

            </div>
        </div>


    </div>


