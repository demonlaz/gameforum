 <?php
 use \yii\helpers\Html;
 use yii\helpers\ArrayHelper;
//echo Yii::$app->controller->route;
 $arr=[];
 switch (Yii::$app->controller->route) {
    case 'user/profile/show':
            $arr['profile']='active';
       
         break;
    case 'user/settings/profile':
        $arr['settingsProfile']='active';
        break;
    case 'user/settings/account':
        $arr['settingsAccount']='active';
        break;
      case 'profile/messages':
        $arr['messages']='active';
        break;
    
    default:
        break;
}
 
 ?>

<!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <?= \app\components\GlobalBanerWidget::widget(['prioritet' => false]) ?>

        <div class="youplay-user-navigation">
            <div class="container">
                <ul>
                    <!--<li><a href="user-activity.html">Activity</a>-->
                    <!--</li>-->
                    <li class="<?= (ArrayHelper::keyExists('profile', $arr)?$arr['profile']:"")?>" ><a href="<?= \yii\helpers\Url::to(['/user/profile']); ?>">Профиль</a>
                    </li>
                    <li  class="<?= (ArrayHelper::keyExists('messages', $arr)?$arr['messages']:"")?>" ><a  href="<?= \yii\helpers\Url::to(['/profile/messages']); ?>">Сообщения <span class="badge" id="countMess" ><?= \app\components\FullCountMessagesWIdget::widget()?></span></a>
                    </li>
                    
                    <li  class="<?= (ArrayHelper::keyExists('settingsProfile', $arr)?$arr['settingsProfile']:"")?>" ><a  href="<?= \yii\helpers\Url::to(['/user/settings/profile']); ?>">Настройки О себе<span class="badge"  ></span></a>
                    </li>
                   <li  class="<?= (ArrayHelper::keyExists('settingsAccount', $arr)?$arr['settingsAccount']:"")?>" ><a  href="<?= \yii\helpers\Url::to(['/user/settings/account']); ?>">Настройки Аккаунта<span class="badge"  ></span></a>
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
                      
                        <h2><?=(!empty(Yii::$app->user->identity->profile->name))?
                    Html::encode(Yii::$app->user->identity->profile->name):
                        Html::encode(Yii::$app->user->identity->username);  ?></h2>
                        <div class="location"><i class="f"><i class="glyphicon glyphicon-map-marker"></i></i> <?= (Html::encode(Yii::$app->user->identity->profile->location)) ? Html::encode(Yii::$app->user->identity->profile->location) : 'Не известно' ?></div>
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