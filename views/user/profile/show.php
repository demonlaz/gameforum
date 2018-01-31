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


    <?=$this->render('/settings/_menu')?>

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
                <td>
                  <p>Вебсайт</p>
                </td>
                <td>
                  <p><?= ($profile->website)?Html::encode($profile->website):'Не известно'?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Часовой пояс</p>
                </td>
                <td>
                  <p><?= ($profile->timezone)?Html::encode($profile->timezone):'Не известно'?></p>
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
            <?= ($profile->bio)?Html::encode($profile->bio):'Не известно'?>
            </div>
          </div>
<!--          <div class="side-block">
            <h4 class="block-title">Google карта</h4>
            <div class="block-content pt-5">
              <div class="responsive-embed responsive-embed-16x9">
                <iframe src="https://www.google.com/maps/"
                width="600" height="450"></iframe>
              </div>
            </div>
          </div>-->
        </div>
        <!-- Left Side -->

      </div>

    </div>

    <!-- Footer -->



  </section>
  <!-- /Main Content -->
 
