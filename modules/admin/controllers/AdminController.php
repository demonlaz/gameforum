<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\admin\controllers;
use yii\filters\AccessControl;
use Yii;
use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{

    public function behaviors() {
        
        parent::behaviors();
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
    
}