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
 * @var dektrium\user\models\ResendForm $model
 */


$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-wrap full youplay-login">
<?php 

$this->title = Yii::t('user', 'Сообшение отправленно!');
?>
    <!-- Banner -->
    <div class="youplay-banner banner-top">
      <?= \app\components\GlobalBanerWidget::widget()?>
      

<div class="info">
        <div>
          <div class="container align-center">
            <div class="youplay-form">

                <?php $form = ActiveForm::begin([
                    'id' => 'resend-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= Html::submitButton(Yii::t('user', 'Продолжить'), ['class' => 'btn btn-primary btn-block']) ?><br>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
    </div>
</section>