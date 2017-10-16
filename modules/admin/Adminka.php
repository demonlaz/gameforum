<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Adminka extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        
          // custom initialization code
         \Yii::$app->view->theme = new \yii\base\Theme([
        'pathMap' => ['@app/views' => '@app/modules/admin/views'
             
            ],
        'baseUrl' => '@web/themes/admin',
    ]);
   // \Yii::$app->view->theme->pathMap = ['@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'];
   // \Yii::$app->view->theme->baseUrl = '@web/themes/admin';
    }
}
