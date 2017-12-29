<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-wrap full youplay-login">

    <!-- Banner -->
    <div class="youplay-banner banner-top">
<?= \app\components\GlobalBanerWidget::widget()?>
<div class="info">
        <div>
          <div class="container align-center">
            <div class="youplay-form">
              <h1>Регистрация</h1>


                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?= $form->field($model, 'email')->textInput([ 'placeholder'=>'Email@mail.com'])->label("") ?>

                <?= $form->field($model, 'username')->textInput([ 'placeholder'=>'Логин'])->label("") ?>

                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput([ 'placeholder'=>'Пароль'])->label("") ?>
                <?php endif ?>

                <?= Html::submitButton(Yii::t('user', 'Зарегистрироватся'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
       
        </div>
</div>
    </div>
</section>