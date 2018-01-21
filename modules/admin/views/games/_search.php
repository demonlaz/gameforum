<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GamesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="games-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'namegames') ?>

    <?= $form->field($model, 'namegamesdop') ?>

    <?= $form->field($model, 'stampgames') ?>

    <?= $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'globalimag') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'url_dowload') ?>

    <?php // echo $form->field($model, 'tehnik_trebov') ?>

    <?php // echo $form->field($model, 'global')->checkbox() ?>

    <?php // echo $form->field($model, 'popular')->checkbox() ?>

    <?php // echo $form->field($model, 'central')->checkbox() ?>

    <?php // echo $form->field($model, 'date_exit') ?>

    <?php // echo $form->field($model, 'date_add') ?>

    <?php // echo $form->field($model, 'date_up') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
