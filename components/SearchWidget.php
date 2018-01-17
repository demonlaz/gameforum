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
public $returnArray=false;
    public function init() {
        parent::init();
//        $this->returnArray=($this->returnArray==null)?false:true;
    }

    public function run() {
        
        $model = new \app\models\SearchForm();
        $arrAutiComplete=\app\models\Games::find()->select(['namegames'])->asArray()->all();
        $arrAutiCompleteNews= \app\models\News::find()->select(['title'])->asArray()->all();
        if ($model->validate() && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->redirect(['/site/search','search'=>$model->search]);
            
        }
        $arr=[];
        $i=0;
        foreach ($arrAutiComplete as $namegames) {
       
          $arr[$i]=$namegames['namegames'];
           $i++;
        }
        $arrNews=[];
        $r=0;
        foreach ($arrAutiCompleteNews as $namegames) {
       
          $arrNews[$r]=$namegames['title'];
           $r++;
        }
        $res= array_merge($arrNews,$arr);
      
        return $this->render('search', ['model' => $model,'arrAutiComplete'=>$res]);
    }

}
