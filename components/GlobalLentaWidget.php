<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use app\models\Games;
/**
 * Description of GlobalLentaWidget
 *
 * @author Demon
 */
class GlobalLentaWidget extends \yii\base\Widget{
 
    public $global=false,
            $popular=false;
    public function init() {
        parent::init();
    }
    
    
    public function run() {
        if($this->popular){
       $model= Games::getDb()->cache(function($Games){
            
            return Games::find()->where('rating>=7')->asArray()->indexBy('id')->all();
        },\Yii::$app->params['cache10']);
        }else{
            
             $model= Games::getDb()->cache(function($Games){
            
            return Games::find()->where('central=:central',[':central'=>1])->asArray()->indexBy('id')->all();
        },\Yii::$app->params['cache10']);
            
        }
     
      return $this->render('globallenta',['model'=>$model]);
    }
}
