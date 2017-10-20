<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "games".
 *
 * @property integer $id
 * @property string $namegames
 * @property string $globalimag
 * @property string $content
 * @property string $url_dowload
 * @property boolean $global
 * @property boolean $popular
 * @property boolean $central
 * @property string $date_add
 * @property string $date_up
 * @property string $tehnik_trebov
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
            [['content','tehnik_trebov'], 'string'],
            [['global', 'popular','central'], 'boolean'],
            [['date_add', 'date_up'], 'safe'],
            [['namegames', 'globalimag', 'url_dowload'], 'string', 'max' => 255],
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
            'globalimag' => 'Globalimag',
            'content' => 'Content',
            'url_dowload' => 'Url Dowload',
            'global' => 'Global',
            'popular' => 'Popular',
            'date_add' => 'Date Add',
            'date_up' => 'Date Up',
        ];
    }
    
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
