<?php
namespace app\components;
use yii\base\Widget;
use app\models\Games;
/**
 * Description of GlobalBanerWidget
 *
 * @author demon
 */
class GlobalBanerWidget extends Widget {
    public $url=false;
    public $prioritet=null;
    public function init() {
        parent::init();
        if($this->prioritet===true){
            $this->prioritet=true;
        }else{
            
             $this->prioritet=false;
        }
    }
    
    
    public function run() {
        $modelgames= Games::getDb()->cache(function($games){
            return Games::find()->where(['global'=>1])->indexBy('id')->one();;
            
        },\Yii::$app->params['cache10']);
        if(!$this->url){
       
      
        return $this->render('globalbaner',['modelgames'=>$modelgames,'prioritet'=>$this->prioritet]);
        
       }else{
           
           return '/imagesgames/'.$modelgames->globalimag;
       }
    }
   
}
