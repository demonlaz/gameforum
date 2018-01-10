<?php
namespace app\models\forms;



class DeletMessagesForm extends \yii\base\Model{
    
    public $hiddenInpu;
    
    public function rules() {
        return [
            [['hiddenInpu'],'required'],
            [['hiddenInpu'],'string'],
            
            
        ];
    }
    
    
}
