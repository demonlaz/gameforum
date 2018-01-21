<?php

namespace app\models;

use Yii;
use app\models\Games;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_parent
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parent'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_parent' => 'Id Parent',
        ];
    }
    public function getGames(){
        
        return $this->hasMany(Games::className(), ['category_id'=>'id'])->count();
    }
    
    public static function getArrayCategory(){
          $result=[];
        $categorys= parent::find()->select(['name','id'])->all();
        foreach ($categorys as $category){
            $result[$category->id]=$category->name;
        }
        return $result;
    }
    
}
