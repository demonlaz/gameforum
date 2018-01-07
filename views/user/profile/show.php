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

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>


  <!-- Main Content -->
  <section class="content-wrap">

    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax small">
    <?= \app\components\GlobalBanerWidget::widget(['prioritet'=>false]) ?>

      <div class="youplay-user-navigation">
        <div class="container">
          <ul>
            <!--<li><a href="user-activity.html">Activity</a>-->
            </li>
            <li class="active"><a href="user-profile.html">Профиль</a>
            </li>
            <li><a href="<?= \yii\helpers\Url::to(['/profile/messages']);?>">Сообщения <span class="badge">6</span></a>
            </li>
            <!--<li><a href="user-settings.html">Settings</a>-->
            </li>
          </ul>
        </div>
      </div>

      <div class="info">
        <div>
          <div class="container youplay-user">
<!--            <a href="assets/images/user-photo.jpg" class="angled-img image-popup">
              <div class="img">
                <img src="assets/images/user-avatar.jpg" alt="">
              </div>
              <i class="fa fa-search-plus icon"></i>
            </a>-->
            <!--
                -->
            <div class="user-data">
              <h2><?=Html::encode($profile->user->username)?></h2>
              <div class="location"><i class="f"><i class="glyphicon glyphicon-map-marker"></i></i> <?= (Html::encode($profile->location))?Html::encode($profile->location):'Не известно' ?></div>
              <div class="activity">
                <div>
                  <div class="num">69</div>
                  <div class="title">Posts</div>
                </div>
                <div>
                  <div class="num">12</div>
                  <div class="title">Games</div>
                </div>
                <div>
                  <div class="num">689</div>
                  <div class="title">Followers</div>
                </div>
              </div>
            </div>
          </div>

          <div class="container mt-20">
            <a href="#!" class="btn btn-sm btn-default ml-0">Add Friend</a>
            <a href="#!" class="btn btn-sm btn-default">Private Message</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /Banner -->

    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          <h3 class="mt-0 mb-20"><?=Html::encode($profile->user->username)?></h3>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 200px;">
                  <p>Город</p>
                </td>
                <td>
                  <p><a href="#"> <?= (Html::encode($profile->location))?Html::encode($profile->location):'Не известно' ?></a>
                  </p>
                </td>
              </tr>
             
               
              </tr>
            </tbody>
          </table>

          <h3 class="mt-40 mb-20">Контактная информация</h3>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 200px;">
                  <p>Дата регистрации</p>
                </td>
                <td>
                  <p><a href="#"><?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?></a>
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Mail</p>
                </td>
                <td>
                  <p><?= ($profile->public_email)?Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) :'Не известно'?></p>
                </td>
              </tr>
              <tr>
<!--                <td>
                  <p>Instagram</p>
                </td>
                <td>
                  <p><a href="#">@instagram</a>
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Twitter</p>
                </td>
                <td>
                  <p><a href="#">#twitter</a>
                  </p>
                </td>-->
              </tr>
            </tbody>
          </table>

      
        
           
            </tbody>
        

        </div>

        <!-- Left Side -->
        <div class="col-md-3">
          <div class="side-block">
            <h4 class="block-title">Обо мне</h4>
            <div class="block-content">
             В разработке
            </div>
          </div>
          <div class="side-block">
            <h4 class="block-title">Google карта</h4>
            <div class="block-content pt-5">
              <div class="responsive-embed responsive-embed-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423284.59051352815!2d-118.41173249999999!3d34.0204989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z0JvQvtGBLdCQ0L3QtNC20LXQu9C10YEsINCa0LDQu9C40YTQvtGA0L3QuNGPLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1430158354122"
                width="600" height="450"></iframe>
              </div>
            </div>
          </div>
        </div>
        <!-- Left Side -->

      </div>

    </div>

    <!-- Footer -->



  </section>
  <!-- /Main Content -->
     <?php if (!empty($profile->bio)): ?>
                    <p><?= Html::encode($profile->bio) ?></p>
                <?php endif; ?>