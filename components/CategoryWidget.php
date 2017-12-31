<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of CategoryWidget
 *
 * @author demon
 */
class CategoryWidget extends \yii\base\Widget {
    public $items;
    public $li=null;
    public function init() {
        parent::init();
      $this->items=($this->items==null)?5:$this->items;
      $this->li=($this->li==null)?false:true;
    }
    
    public function run() {
      $model = \app\models\Category::find()->asArray()->indexBy('id')->orderBy('name')->all();
        return $this->render('category',['model'=>$model,'items'=>$this->items,'li'=> $this->li]);
    }
}
