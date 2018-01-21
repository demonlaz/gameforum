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
class Images extends \yii\db\ActiveRecord {

    public $uploadArrImages;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_parent_games'], 'integer'],
            [['images_games'], 'string', 'max' => 255],
            [['uploadArrImages'], 'file', 'extensions' => 'png,jpg,gif','maxFiles' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_parent_games' => 'Id Parent Games',
            'images_games' => 'Images Games',
        ];
    }

    public function upload($id) {
        $path = Yii::$app->params['pathUploads'] . 'skringames/';
        if ($this->validate()) {
            $this->deleteAll(['id_parent_games'=>$id]);
            $i=1;
            foreach ($this->uploadArrImages as $file) {
                $md5 = md5(time()+$i);
                $fullname=$md5.$file->name;
                $file->saveAs($path .$fullname);
                $model= new Images();
                $model->id_parent_games=$id;
                $model->images_games=$fullname;
                $model->save();
                $i++;
            }
            return true;
        } else {
            return false;
        }
    }

}
