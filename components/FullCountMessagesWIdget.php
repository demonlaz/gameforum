<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of FullCountMessagesWIdget
 *
 * @author demon
 */
class FullCountMessagesWIdget extends \yii\base\Widget {
    public function init() {
        parent::init();
    }
    
    public function run() {
                $fullCount= \app\models\Messages::find()->where(['loginTo'=>\Yii::$app->user->identity->username,'readContent'=>0])->count();
                return $fullCount;

    }
}
