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
            return Games::find()->where(['global'=>1])->select('namegames,globalimag')->one();;
            
        },\Yii::$app->params['cache10']);
        
       
        
        
        return $this->render('globalbaner',['modelgames'=>$modelgames,'prioritet'=>$this->prioritet]);
    }
   
}
