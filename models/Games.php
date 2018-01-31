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
class Games extends \yii\db\ActiveRecord {

    public $uploadImage;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'games';
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

    /**
     * @inheritdoc 
     */
    public function rules() {
        return [
            [['content','date_exit','category_id','namegames'], 'required'],
            [['content', 'tehnik_trebov'], 'string'],
        [['tehnik_trebov'],'filter','filter'=> function($value){
              $res=  strpos($value, '<li><i class="fa icon"><i class="glyphicon glyphicon-ok">');
              if($res===false){
                   return  str_replace('<li>', '<li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i>', $value);
              }else{
                    $li= str_replace('<li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i>', '<li>', $value);
                    return  str_replace('<li>', '<li><i class="fa icon"><i class="glyphicon glyphicon-ok"></i></i>', $li);
                    
              }
             
        }],
            [['global', 'popular', 'central'], 'boolean'],
            [['date_exit', 'date_add', 'date_up'], 'safe'],
            [['category_id', 'rating'], 'integer'],
            [['namegames', 'namegamesdop', 'stampgames', 'url_dowload', 'globalimag'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['uploadImage', 'image', 'extensions' => 'png,jpg,gif', 'message' => 'Форматы для загрузки png,jpg,gif',
                'maxWidth' => 2500, 'maxHeight' => 2500, 'minWidth' => 1200, 'minHeight' => 800],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'namegames' => 'Название игры',
            'namegamesdop' => 'Дополнительно к названию игры',
            'stampgames' => 'Краткое описание',
            'rating' => 'Рейтинг',
            'globalimag' => 'Главная картинка',
            'content' => 'Описание игры',
            'url_dowload' => 'Где скачать',
            'tehnik_trebov' => 'Технические требования',
            'global' => 'Главной игра',
            'popular' => 'В ленте популярная',
            'central' => 'В центральной ленте ',
            'date_exit' => 'дата выхода игры ',
            'date_add' => 'Дата дабавления',
            'date_up' => 'дата обновления возможно смнеить на int',
            'category_id' => 'Категория игры',
             'uploadImage'=>'Главный банер игры',
        ];
    }

    
   
    
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments() {
        return $this->hasMany(Comments::className(), ['id_games' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages() {
        return $this->hasMany(Images::className(), ['id_parent_games' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews() {
        return $this->hasMany(News::className(), ['id_games' => 'id']);
    }

 /* @return array namegames & id
  * 
  *  */
    
    public static function getArrayGames(){
        
        $model= parent::find()->select(['id','namegames'])->all();
        $i=[];
        return \yii\helpers\ArrayHelper::map($model, 'id', 'namegames');
        
    }
    
}