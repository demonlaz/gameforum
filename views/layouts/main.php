<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>




        <!-- Icon -->
        <link rel="icon" type="image/png" href="/images/icon.png">
        <!-- Google Fonts -->










        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <!-- Preloader -->
        <div class="page-preloader preloader-wrapp">
            <img src="/images/logo.png" alt="">
            <div class="preloader"></div>
        </div>
        <!-- /Preloader -->


        <!-- Navbar -->
        <nav class="navbar-youplay navbar navbar-default navbar-fixed-top ">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= \yii\helpers\Url::to('/') ?>">
                        <img src="/images/logo.png" alt="">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php if (empty(Yii::$app->user->identity->username)): ?>
                            <li class='dropdown dropdown-hover'> 
                                <a href="<?= \yii\helpers\Url::to('/user/security/login') ?>" class="dropdown-toggle">Вход</a>
                            </li>
                        <?php endif; ?>
                        <?php if (empty(Yii::$app->user->identity->username)): ?>
                            <li class='dropdown dropdown-hover'> 
                                <a href="<?= \yii\helpers\Url::to('/user/registration/register') ?>" class="dropdown-toggle">Регистрация</a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty(Yii::$app->user->identity->isAdmin)): ?>
                            <li class='dropdown dropdown-hover'> 
                                <a href="<?= \yii\helpers\Url::to('/admin/admin') ?>" class="dropdown-toggle">админка</a>
                            </li>
                        <?php endif; ?>


                        <li class="dropdown dropdown-hover ">
                            <a href='#!' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Категория <span class="caret"></span>
                            </a>


                            <?= \app\components\CategoryWidget::widget(['items' => 5]) ?>

                        </li>

                        <li class="dropdown dropdown-hover ">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Features <span class="caret"></span> <span class="label">full list</span>
                            </a>
                            <div class="dropdown-menu">
                                <ul role="menu">
                                    <li class="dropdown dropdown-submenu pull-left ">
                                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User</a>
                                        <div class="dropdown-menu">
                                            <ul role="menu">
                                                <li><a href="user-activity.html">Activity</a>
                                                </li>
                                                <li><a href="<?= \yii\helpers\Url::to(['/web/user/profile']) ?>">Профиль</a>
                                                </li>
                                                <li><a href="user-messages.html">Messages</a>
                                                </li>
                                                <li><a href="user-messages-compose.html">Messages Compose</a>
                                                </li>
                                                <li><a href="user-settings.html">Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="forums.html">Forums</a>
                                    </li>
                                    <li><a href="forums-topics.html">Forums Topics</a>
                                    </li>
                                    <li><a href="forums-single-topic.html">Single Topic</a>
                                    </li>
                                    <li><a href="matches-list.html">Matches List</a>
                                    </li>
                                    <li><a href="match.html">Match</a>
                                    </li>
                                    <li><a href="match-2.html">Match with Maps</a>
                                    </li>
                                </ul>
                                <ul role="menu">
                                    <li><a href="widgets.html">Widgets <span class="badge bg-default">New</span></a>
                                    </li>
                                    <li><a href="components.html">Components</a>
                                    </li>
                                    <li><a href="coming-soon.html">Coming Soon</a>
                                    </li>
                                    <li><a href="contact.html">Contact Us</a>
                                    </li>
                                    <li><a href="search.html">Search</a>
                                    </li>
                                    <li><a href="login.html">Login</a>
                                    </li>
                                    <li><a href="404.html">404</a>
                                    </li>
                                    <li><a href="blank.html">Blank</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                         <li>
                            <?php echo (isset($this->blocks['search']))?'':app\components\SearchWidget::widget() ?>
                        </li> 
                        <li>
                            <p></p>
                            
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <p></p>
                            
                        </li>
                        <li class="dropdown dropdown-hover">

                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?= (!empty(\Yii::$app->user->identity->username)) ? \Yii::$app->user->identity->username . '<span class="badge bg-default">2</span> <span class="caret"></span> <span class="glyphicon glyphicon-user"></span>' : '' ?> 
                            </a>
                            <div class="dropdown-menu">
                                <ul role="menu">
                                    <li>
                                    </li>

                                    <li class="divider"></li>

                                    <li><a href="<?= \yii\helpers\Url::to(['/user/profile']) ?>" >Профиль <span class="badge pull-right bg-warning">13</span></a>
                                    </li>

                                    <li class="divider"></li>

                                    <li><a href=<?= \yii\helpers\Url::to('/site/logout') ?>>Выйти</a>
                                    </li>
                                    <li class="dropdown dropdown-submenu pull-left">

                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Navbar -->

        <!-- Main Content -->
        <section class="content-wrap">

            <?php // Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ])  ?>
            <?= $content ?>






            <!-- Footer -->
            <footer class="youplay-footer-parallax">
                <div class="wrapper" style="background-image: url('/images/footer-bg.jpg')">

                    <!-- Social Buttons -->
                    <div class="social">
                        <div class="container">
                            <h3>Connect socially with <strong>youplay</strong></h3>

                            <div class="social-icons">
                                <div class="social-icon">
                                    <a href="#!">
                                        <i class="fa fa-facebook-square"></i>
                                        <span>Like on Facebook</span>
                                    </a>
                                </div>
                                <div class="social-icon">
                                    <a href="#!">
                                        <i class="fa fa-twitter-square"></i>
                                        <span>Follow on Twitter</span>
                                    </a>
                                </div>
                                <div class="social-icon">
                                    <a href="#!">
                                        <i class="fa fa-twitch"></i>
                                        <span>Watch on Twitch</span>
                                    </a>
                                </div>
                                <div class="social-icon">
                                    <a href="#!">
                                        <i class="fa fa-youtube-square"></i>
                                        <span>Watch on Youtube</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Social Buttons -->

                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="container">
                            <strong>nK</strong> &copy; 2016. All rights reserved
                        </div>
                    </div>
                    <!-- /Copyright -->

                </div>
            </footer>
            <!-- /Footer -->

        </section>
        <!-- /Main Content -->

        <!-- Search Block поисковая форма требуется дороботка-->
        <div class="search-block">
            <a href="#!" class="search-toggle glyphicon glyphicon-remove"></a>
            <form action="">
                <div class="youplay-input">
                    <input type="text" name="search" placeholder="Search...">
                </div>
            </form>
        </div>
        <!-- /Search Block -->
        <!-- jQuery -->
        <script type="text/javascript" src="/assetsb/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Hexagon Progress -->
        <script type="text/javascript" src="/assetsb/bower_components/HexagonProgress/jquery.hexagonprogress.min.js"></script>


        <!-- Bootstrap -->
        <script type="text/javascript" src="/assetsb/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Jarallax -->
        <script type="text/javascript" src="/assetsb/bower_components/jarallax/dist/jarallax.min.js"></script>

        <!-- Smooth Scroll -->
        <script type="text/javascript" src="/assetsb/bower_components/smoothscroll-for-websites/SmoothScroll.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="/assetsb/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

        <!-- Countdown -->
        <script type="text/javascript" src="/assetsb/bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
        <!-- Youplay -->
        <script type="text/javascript" src="/assetsb/youplay/js/youplay.min.js"></script>
        <!-- init youplay -->
        <script>
            if (typeof youplay !== 'undefined') {
                youplay.init({
                    // enable parallax
                    parallax: true,

                    // set small navbar on load
                    navbarSmall: false,

                    // enable fade effect between pages
                    fadeBetweenPages: true,

                    // twitter and instagram php paths
                    php: {
                        twitter: './php/twitter/tweet.php',
                        instagram: './php/instagram/instagram.php'
                    }
                });
            }
        </script>


        <script type="text/javascript">
            $(".countdown").each(function () {
                $(this).countdown($(this).attr('data-end'), function (event) {
                    $(this).text(
                            event.strftime('%D days %H:%M:%S')
                            );
                });
            })
        </script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
