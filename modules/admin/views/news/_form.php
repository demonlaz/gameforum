<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); 
// damp(app\models\Games::getArrayGames());
    
    ?>
    
    <?= $form->field($model, 'id_games')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\models\Games::getArrayGames(),
        'language' => 'ru',
        'pluginEvents' => [
        //  "select2:open" => 'function() { $(".select2-results__options").css("min-height","600px") }',
        ],
        'options' => [
            'multiple' => false,
       
        ],
    ])->label('Категория'); ?>

    <?= $form->field($model, 'title')->label('Заголовок') ?>

    <?= $form->field($model, 'content_short')->widget(\vova07\imperavi\Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'placeholder'=>''
    ],
]); ?>

    <?= $form->field($model, 'content')->widget(\vova07\imperavi\Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'placeholder'=>''
    ],
]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
