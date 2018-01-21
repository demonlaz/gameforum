<?php


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
            
            return Games::find()->where('rating>=7')->orWhere('popular=1')->orderBy('date_add DESC')->asArray()->indexBy('id')->all();
        },\Yii::$app->params['cache10']);
        }else{
            
             $model= Games::getDb()->cache(function($Games){
            
            return Games::find()->where('central=:central',[':central'=>1])->asArray()->indexBy('id')->orderBy('date_add DESC')->all();
        },\Yii::$app->params['cache10']);
            
        }
     
      return $this->render('globallenta',['model'=>$model]);
    }
}
