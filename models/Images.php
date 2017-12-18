<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $id_parent_games
 * @property string $images_games
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parent_games'], 'integer'],
            [['images_games'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent_games' => 'Id Parent Games',
            'images_games' => 'Images Games',
        ];
    }
}
