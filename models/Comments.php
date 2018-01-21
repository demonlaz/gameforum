<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $id_games
 * @property int $reply id коментария на который отвечают
 * @property string $login
 * @property string $content
 * @property string $date_add
 * @property string $date_up
 *
 * @property Games $games
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_games', 'reply'], 'integer'],
            [['content'], 'string','max'=>1000],
            [['date_add', 'date_up'], 'safe'],
            [['login'], 'string', 'max' => 255],
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
            'reply' => 'id коментария на который отвечают',
            'login' => 'Login',
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
    
    public function behaviors()
  {
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
