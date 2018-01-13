<?php

namespace app\controllers;

use app\controllers\SiteController;

class NewsController extends SiteController {

    //все новости 
    public function actionIndex() {
        $query = \app\models\News::find()->indexBy('id')->orderBy('date_up DESC');

        $paginations = new \yii\data\Pagination(['totalCount' => $query->count()]);
        $modelFullNews = $query->offset($paginations->offset)->limit($paginations->limit)->joinWith('games')->all();
        return $this->render('index',['paginations'=>$paginations,'modelFullNews'=>$modelFullNews]);
    }

    //Подробная новость
    public function actionPost($id = null) {
        if(is_numeric($id)){
        $modelNews= \app\models\News::find()->where('id=:id',[':id'=>$id])->one();
        
        return ($modelNews)?$this->render('post',['modelNews'=>$modelNews]):$this->goHome();
        }else{
           return $this->goHome();
        }
    }

}
