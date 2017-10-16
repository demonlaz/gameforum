<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       // 'css/site.css',
       
       // 'assetsb/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'assetsb/bower_components/font-awesome/css/font-awesome.min.css',
        'assetsb/bower_components/owl.carousel/dist/assets/owl.carousel.min.css',
        'assetsb/youplay/css/youplay.min.css',
         'css/custom.css'
        
    ];
    public $js = [
//         'assetsb/bower_components/jquery/dist/jquery.min.js',
//        'assetsb/bower_components/HexagonProgress/jquery.hexagonprogress.min.js',
//        'assetsb/bower_components/bootstrap/dist/js/bootstrap.min.js',
//        'assetsb/bower_components/jarallax/dist/jarallax.min.js',
//        'assetsb/bower_components/smoothscroll-for-websites/SmoothScroll.js',
//        'assetsb/bower_components/owl.carousel/dist/owl.carousel.min.js',
//        'assetsb/bower_components/jquery.countdown/dist/jquery.countdown.min.js',
//        'assetsb/youplay/js/youplay.min.js'
    ];
    public $depends = [
       'yii\web\YiiAsset',
      'yii\bootstrap\BootstrapPluginAsset',
       
        
    ];
}
