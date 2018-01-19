<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $namegames название игры
 * @property string $namegamesdop дополнительно к названию игры
 * @property string $stampgames пометка к игре
 * @property double $rating рейтинг игры макс 10
 * @property string $globalimag главная картинка
 * @property string $content описание игры
 * @property string $url_dowload сайт производитель
 * @property string $tehnik_trebov
 * @property bool $global главаня игра 1 да
 * @property bool $popular популярная игра 1 да
 * @property bool $central 1 отоброжать 
 * @property string $date_exit дата выхода игры 
 * @property string $date_add дата дабавления возможно смнеить на int
 * @property string $date_up дата обновления возможно смнеить на int
 * @property int $category_id категория игры
 *
 * @property Comments[] $comments
 * @property Category $category
 * @property Images[] $images
 * @property News[] $news
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
            [['date_exit', 'date_add', 'date_up'], 'safe'],
            [['category_id'], 'integer'],
            [['namegames', 'namegamesdop', 'stampgames', 'globalimag', 'url_dowload'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namegames' => 'название игры',
            'namegamesdop' => 'дополнительно к названию игры',
            'stampgames' => 'пометка к игре',
            'rating' => 'рейтинг игры макс 10',
            'globalimag' => 'главная картинка',
            'content' => 'описание игры',
            'url_dowload' => 'сайт производитель',
            'tehnik_trebov' => 'Tehnik Trebov',
            'global' => 'главаня игра 1 да',
            'popular' => 'популярная игра 1 да',
            'central' => '1 отоброжать ',
            'date_exit' => 'дата выхода игры ',
            'date_add' => 'дата дабавления возможно смнеить на int',
            'date_up' => 'дата обновления возможно смнеить на int',
            'category_id' => 'категория игры',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['id_games' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['id_parent_games' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['id_games' => 'id']);
    }
}
