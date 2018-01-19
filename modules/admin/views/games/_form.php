<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="games-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'namegames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namegamesdop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stampgames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'globalimag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url_dowload')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tehnik_trebov')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'global')->checkbox() ?>

    <?= $form->field($model, 'popular')->checkbox() ?>

    <?= $form->field($model, 'central')->checkbox() ?>

    <?= $form->field($model, 'date_exit')->textInput() ?>

    <?= $form->field($model, 'date_add')->textInput() ?>

    <?= $form->field($model, 'date_up')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
