<?php


namespace app\models;

/**
 * Description of SearchForm
 *
 * @author demon
 */
class SearchForm extends \yii\base\Model {
    public $search;
    
    
     public function rules()
    {
        return [
            [['search'], 'string'],
          
        ];
    }
    
    public function activeAttributes() {
        return ['search'=>''];
    }
}
