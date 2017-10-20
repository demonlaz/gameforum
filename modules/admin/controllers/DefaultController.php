<?php

namespace app\modules\admin\controllers;
use yii\filters\AccessControl;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    
    
    
    public function behaviors() {
        
        
        return  ['access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                       // 'roles'=>['?'],
                        'matchCallback'=>function($rule,$action){
            
                            return !empty(Yii::$app->user->identity->isAdmin);
                        }
                    ],
                ],
            ] ] ;
    }
    
    //public $layout='content';
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
