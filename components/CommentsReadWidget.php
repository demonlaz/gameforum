<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \app\models\Comments;
namespace app\components;

/**
 * Description of CommentsWidget
 *
 * @author demon extend
 */
class CommentsReadWidget extends \yii\base\Widget{
    
    public $id_games=false;
    public function init() {
        parent::init();
    }
    
    public function run() {
       $countComments= \app\models\Comments::find()->where(['id_games'=>$this->id_games])->count();
        $query= \app\models\Comments::find()->where(['id_games'=>$this->id_games,'reply'=>0])->asArray()->orderBy('date_add DESC');
       $pagination=new \yii\data\Pagination(['totalCount'=>$query->count()]);
       $modelComments=  $query->offset($pagination->offset)
         ->limit($pagination->limit)
         ->all();
       
     //$modelComments = \app\models\Comments::find()->where(['id_games'=>$this->id_games,'reply'=>0])->asArray()->orderBy('date_add DESC')->all();
        $modelCommentsReply = \app\models\Comments::find()->where(['id_games'=>$this->id_games])->andWhere(['>','reply',0])->asArray()->orderBy('date_add DESC')->all();
    
        return  $this->render('comments_read',['modelComments'=>$modelComments,'modelCommentsReply'=>$modelCommentsReply,'countComments'=>$countComments,'pagination'=>$pagination]);
    }
}
