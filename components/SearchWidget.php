<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of SearchWidget
 *
 * @author demon
 */
class SearchWidget extends \yii\base\Widget {

    public function init() {
        parent::init();
    }

    public function run() {

        $model = new \app\models\SearchForm();

        if ($model->validate() && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->redirect(['/site/search','search'=>$model->search]);
            
        }

        return $this->render('search', ['model' => $model]);
    }

}
