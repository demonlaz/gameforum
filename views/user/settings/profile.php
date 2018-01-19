<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */
$this->title = empty(Yii::$app->user->identity->profile->name) ? Html::encode(Yii::$app->user->identity->username) :
        Html::encode(Yii::$app->user->identity->profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Main Content -->
<section class="content-wrap">

    <?= $this->render('_menu') ?>



    <!-- Information -->
    <div class="requirements-block">





        <style>
            .settingProfile{
                max-width: 50%;
                margin: 0 auto;
            }
        </style>

        <div class="panel-body">
            <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
            <div class="settingProfile">
                <?php
                $form = \yii\bootstrap\ActiveForm::begin([
                            'id' => 'profile-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                            ],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                            'validateOnBlur' => false,
                ]);
                ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'public_email') ?>

                <?= $form->field($model, 'website') ?>

                <?= $form->field($model, 'location') ?>

                <?=
                        $form
                        ->field($model, 'timezone')
                        ->dropDownList(
                                \yii\helpers\ArrayHelper::map(
                                        \dektrium\user\helpers\Timezone::getAll(), 'timezone', 'name'
                                )
                );
                ?>

                <?=
                        $form
                        ->field($model, 'gravatar_email')
                        ->hint(Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com'))
                ?>

                <?= $form->field($model, 'bio')->textarea() ?>

                <div class="form-group">

                    <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success', 'style' => 'width:80%;margin:0 auto;']) ?>
                    <br>

                </div>

                <?php \yii\bootstrap\ActiveForm::end(); ?>
            </div>
        </div>
      


    </div>
    <!-- /Information -->




</section>
<!-- /Main Content -->








