<?php

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Вход');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<section class="content-wrap full youplay-login">

    <!-- Banner -->
    <div class="youplay-banner banner-top">
     <?= \app\components\GlobalBanerWidget::widget()?>

<div class="info">
        <div>
          <div class="container align-center">
            <div class="youplay-form">
              <h1>Вход</h1>
                <?php $form = ActiveForm::begin([
                    
                    'id' => 'login-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
                    'class'=>'youplay-form',
                ]) ?>

                <?php if ($module->debug): ?>
               <div class="youplay-input">
                    <?= $form->field($model, 'login', [
                        'inputOptions' => [
                            'autofocus' => 'autofocus',
                            'placeholder'=>'Логин',
                           
                            'tabindex' => '1']])->dropDownList(LoginForm::loginList());
                    ?>
               </div>
                <?php else: ?>
                                  <div class="youplay-input">                          
                    <?= $form->field($model, 'login',
                        ['inputOptions' => ['autofocus' => 'autofocus', 'placeholder'=>'Логин', 'tabindex' => '1']]
                    )->label('');
                    ?>
                                  </div>
                <?php endif ?>

                <?php if ($module->debug): ?>
                    <div class="alert alert-warning">
                        <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
                    </div>
                <?php else: ?>
               <div class="youplay-input">
                    <?= $form->field(
                        $model,
                        'password',
                        ['inputOptions' => ['class' => 'form-control','placeholder'=>'Пароль', 'tabindex' => '2']])
                        ->passwordInput()
                        ->label(""
                            )
                         ?>
               </div>
                <?php endif ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>

                <?= Html::submitButton(
                    Yii::t('user', 'Войти'),
                    ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
                ) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
           
                            <?php if($module->enablePasswordRecovery): ?>
                              <p class="text-center">
                                    
                               <?=Html::a(Yii::t('user', 'Забыли пароль?'), ['/user/recovery/request'])?>
                              </p>
   <?php     endif;    ?>
            
        <?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Не получили сообшение?'), ['/user/registration/resend']) ?>
            </p>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Если у вас нет акаунта.Зарегистрируйтесь!'), ['/user/registration/register']) ?>
            </p>
        <?php endif ?>
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
    </div>
</div>
</div>

</section>

