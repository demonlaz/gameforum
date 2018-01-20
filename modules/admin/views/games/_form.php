<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="games-form">

    <?php $form = ActiveForm::begin(); 

    ?>

    <?= $form->field($model, 'namegames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namegamesdop')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'category_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\models\Category::getArrayCategory(),
        'language' => 'ru',
        'pluginEvents' => [
        //  "select2:open" => 'function() { $(".select2-results__options").css("min-height","600px") }',
        ],
        'options' => [
            'multiple' => false,
        // 'options' => $arr
        ],
    ])->label('Категория');
    ?>

    <?= $form->field($model, 'stampgames')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>



    <?php
    echo $form->field($model, 'uploadImage')->widget(kartik\file\FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);
// редактор
//            $form->field($model, 'globalimag')->widget(\vova07\imperavi\Widget::className(), [
//    'settings' => [
//        'lang' => 'ru',
//        'minHeight' => 200,
//        'plugins' => [
//            'clips',
//            'fullscreen',
//        ],
//    ],
//]); 
    ?>



    <?= $form->field($model, 'url_dowload')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tehnik_trebov')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'date_exit')->textInput() ?>




    <label class="control-label">Рейтинг</label>
    <p></p>
    <?=
    yii\jui\Spinner::widget([
        'model' => $model,
        'attribute' => 'rating',
        'clientOptions' => ['step' => 1, 'max' => 10, 'min' => 0],
    ])
    ?>


    <?= $form->field($model, 'global')->hiddenInput(['value'=>1])->label('') ?>

    <?= $form->field($model, 'popular')->checkbox() ?>

    <?= $form->field($model, 'central')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
