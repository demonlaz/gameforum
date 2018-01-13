<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of SendFormComments
 *
 * @author demon
 */
class SendFormComments extends \yii\base\Widget {
     public $error=false;
   public $send=false;
   public $urlSend=false;
   public $id_games=false;
    public function init() {
        parent::init();
    }
    
    public function run() {
        
        $modelForm=new \app\models\forms\CommentForm();
        return $this->render('commentsform',['modelForm'=>$modelForm,'error'=>$this->error,
            'send'=>$this->send,'urlSend'=>$this->urlSend,'id_games'=>$this->id_games]);
    }
}
