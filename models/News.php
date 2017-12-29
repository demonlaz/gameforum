<?php

namespace app\models;
use app\models\Games;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $id_games
 * @property string $title
 * @property string $content
 * @property string $date_add
 * @property string $date_up
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_games'], 'integer'],
            [['title', 'content','content_short'], 'string'],
            [['content_short'],'max'=>100],
            [['title'],'max'=>50],
            [['date_add', 'date_up'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_games' => 'Id Games',
            'title' => 'Title',
            'content_short'=>"Краткий контент",
            'content' => 'Content',
            'date_add' => 'Date Add',
            'date_up' => 'Date Up',
        ];
    }
    
    
      public function getGames(){
        
        return $this->hasMany(Games::className(), ['id'=>'id_games']);
    }
    
    public function behaviors() {
        return [
          [
              'class' => TimestampBehavior::className(),
             'createdAtAttribute' => 'date_add',
              'updatedAtAttribute' => 'date_up',
              'value' => new \yii\db\Expression('NOW()'),
          ],
     ];
    }
}
