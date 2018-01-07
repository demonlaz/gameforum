<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int $id_games
 * @property int $id_username
 * @property int $rating_to_user
 * @property int $rating_full_with_user
 * @property string $data_add
 * @property string $data_up
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_games', 'id_username', 'rating_to_user', 'rating_full_with_user'], 'integer'],
            [['data_add', 'data_up'], 'safe'],
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
            'id_username' => 'Id Username',
            'rating_to_user' => 'Rating To User',
            'rating_full_with_user' => 'Rating Full With User',
            'data_add' => 'Data Add',
            'data_up' => 'Data Up',
        ];
    }
}
