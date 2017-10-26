<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use app\models\News;

/**
 * This is the model class for table "games".
 *
 * @property integer $id
 * @property string $namegames
 * @property string $namegamesdop
 * @property string $stampgames
 * @property double $rating
 * @property string $globalimag
 * @property string $content
 * @property string $url_dowload
 * @property string $tehnik_trebov
 * @property boolean $global
 * @property boolean $popular
 * @property boolean $central
 * @property string $date_add
 * @property string $date_up
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rating'], 'number'],
            [['content', 'tehnik_trebov'], 'string'],
            [['global', 'popular', 'central'], 'boolean'],
            [['date_add', 'date_up'], 'safe'],
            [['namegames', 'namegamesdop', 'stampgames', 'globalimag', 'url_dowload'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namegames' => 'Namegames',
            'namegamesdop' => 'Namegamesdop',
            'stampgames' => 'Stampgames',
            'rating' => 'Rating',
            'globalimag' => 'Globalimag',
            'content' => 'Content',
            'url_dowload' => 'Url Dowload',
            'tehnik_trebov' => 'Tehnik Trebov',
            'global' => 'Global',
            'popular' => 'Popular',
            'central' => 'Central',
            'date_add' => 'Date Add',
            'date_up' => 'Date Up',
        ];
        
        
    }
    
//     public function getNews(){
//        
//        return $this->hasOne(News::className(), ['id_games'=>'id']);
//    }
    
    public function behaviors()
  {
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
