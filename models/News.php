<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $id_games
 * @property string $title
 * @property string $content_short
 * @property string $content
 * @property string $date_add
 * @property string $date_up
 *
 * @property Games $games
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
            [['title', 'content_short', 'content'], 'string'],
            [['date_add', 'date_up'], 'safe'],
            [['id_games'], 'exist', 'skipOnError' => true, 'targetClass' => Games::className(), 'targetAttribute' => ['id_games' => 'id']],
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
            'content_short' => 'Content Short',
            'content' => 'Content',
            'date_add' => 'Date Add',
            'date_up' => 'Date Up',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasOne(Games::className(), ['id' => 'id_games']);
    }
    
    
       public function behaviors() {
        return [
          [
              'class' => \yii\behaviors\TimestampBehavior::className(),
             'createdAtAttribute' => 'date_add',
              'updatedAtAttribute' => 'date_up',
              'value' => new \yii\db\Expression('NOW()'),
          ],
     ];
    }
}
