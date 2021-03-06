<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $loginFrom от кого
 * @property string $loginTo к кому
 * @property string $content содержание 
 * @property bool $readContent 1 если пользователь прочитал сообщение
 * @property string $date_add дата создания 
 * @property string $date_up дат редактирования
 */
class Messages extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['content'], 'string', 'max' => 1000],
            [['readContent'], 'boolean'],
            [['readContent'], 'default', 'value' => 0],
            [['date_add', 'date_up'], 'safe'],
            [['loginFrom', 'loginTo'], 'string', 'max' => 250],
            [['loginTo'], 'filter','filter'=>function($value){
            
             $returnModel = \dektrium\user\models\User::findOne(['username'=> $value]);
        
        return ($returnModel and $returnModel->id)?$returnModel->username:$this->errors;
            }],
            [['content', 'loginTo'], 'required'],
            [['loginFrom'], 'default', 'value' => Yii::$app->user->identity->username],
        ];
    }

    public function search_login() {

        $returnModel = \dektrium\user\models\User::findOne(['username'=> $this->loginTo]);
        
        return ($returnModel and $returnModel->id)?$returnModel->username:false;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'loginFrom' => 'От',
            'loginTo' => 'Кому',
            'content' => 'Содержание',
            'readContent' => 'Read Content',
            'date_add' => 'Date Add',
            'date_up' => 'Date Up',
        ];
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
