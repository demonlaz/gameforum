<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use app\models\News;

/**
 * Description of NewsWidget
 *
 * @author demon
 */
class NewsWidget extends \yii\base\Widget {

    public $sidbar = false;

    public function init() {
        parent::init();
    }

    public function run() {

        $model = News::getDb()->cache(function($news) {
            return News::find()->indexBy('id')->orderBy('date_up DESC')->limit(5)->innerJoinWith('games')->all();
        }, \Yii::$app->params['cache10']);




        return $this->render('news', ['model' => $model, 'sidbar' => $this->sidbar]);
    }

}
