<?php


namespace app\components;

/**
 * Description of SendFormMessagesWidget
 *
 * @author demon
 */
class SendFormMessagesWidget extends \yii\base\Widget {
   public $error=false;
   public $send=false;
    public function init() {
        parent::init();
        $this->error=($this->error==false)?false:true;
        $this->send=($this->send==false)?false:true;
        
    }
    public function run() {
        $modelForm= new \app\models\Messages();
        
        return $this->render('sendformmessages',['modelForm'=>$modelForm,'error'=>$this->error,
            'send'=>$this->send]);
    }
}
