<?php

namespace app\controllers;

use yii\filters\AccessControl;
use Yii;

class ProfileController extends SiteController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionMessages() {
        $modelMessagesLogin = \app\models\Messages::find()
                        ->select(['loginFrom'])
                        ->where(['loginTo' => \Yii::$app->user->identity->username])
                        ->distinct()->all();
        $modelMessagesContent = \app\models\Messages::find()
                        ->indexBy('id')
                        ->asArray()
                        ->orderBy('date_add DESC')
                        ->where(['loginTo' => \Yii::$app->user->identity->username])->all();
        $modelMessagesCount = \app\models\Messages::find()
                ->select(['loginFrom', 'count(loginFrom ) as countLoginFrom'])
                ->groupBy(['loginFrom', 'readContent', 'loginTo'])
                ->having(['readContent' => 0, 'loginTo' => \Yii::$app->user->identity->username])
                ->asArray()
                ->all();
        $fullCount = \app\models\Messages::find()
                ->where(['loginTo' => \Yii::$app->user->identity->username, 'readContent' => 0])
                ->count();
        $formDelet=new \app\models\forms\DeletMessagesForm();
//select loginFrom,count(loginFrom ) as con,readContent from messages group by loginFrom,readContent,loginTo having readContent is null and loginTo='demonlaz'
        return $this->render('messages', ['modelMessagesLogin' => $modelMessagesLogin,
                    'modelMessagesContent' => $modelMessagesContent,
                    'modelMessagesCount' => $modelMessagesCount,
                    'fullCount' => $fullCount,
                    'formDelet'=>$formDelet
        ]);
    }
//Обработка и изменеия прочитаных сообщений
    public function actionReadContentAjax($status = false, $name = false) {

        $statusDec = json_decode($status);
        $validate = \yii\base\DynamicModel::validateData(compact('name', 'statusDec'), [
                    [['name', 'statusDec'], 'required'],
                    [['name'], 'string', 'max' => 200],
                    [['statusDec'], 'boolean'],
        ]);
        if ($validate->hasErrors()) {
            return json_encode(false);
        } else {
            if (!empty($name)) {
                 $countRearUser= \app\models\Messages::find()->where(['readContent' => 0,
                    'loginTo' => \Yii::$app->user->identity->username,
                    'loginFrom' => $name])->count();
                $res=\app\components\FullCountMessagesWIdget::widget()-$countRearUser;
                \app\models\Messages::updateAll(['readContent' => 1], ['readContent' => 0,
                    'loginTo' => \Yii::$app->user->identity->username,
                    'loginFrom' => $name]);
               
                return json_encode($res);
            } else {
                return json_encode(false);
            }
        }
    }

    public function actionMessagesSend() {

        $model = new \app\models\Messages();

        if ($model->load(\Yii::$app->request->post()) && $model->validate($model->save(true))) {
            return \app\components\SendFormMessagesWidget::widget(['send' => true]);
        } else {
            return \app\components\SendFormMessagesWidget::widget(['error' => true]);
        }
    }
    //удаления сообщений
    public function actionRemoveMessages(){
     
           $validatFrom=New \app\models\forms\DeletMessagesForm();
           if($validatFrom->load(Yii::$app->request->post()) && $validatFrom->validate()){
            \app\models\Messages::deleteAll(['loginFrom'=>$validatFrom->hiddenInpu,'loginTo'=> Yii::$app->user->identity->username]);
//            print_r(Yii::$app->request->post());
           return $this->redirect(['/profile/messages']);
           }else{
               return $this->redirect(['/profile/messages']);
           }
           
           

        
      
    }

    public function actionRatingGames() {



        //обработка звездного рейтинга
        if (Yii::$app->request->isPost && Yii::$app->request->isAjax && Yii::$app->request->post('rait') && Yii::$app->request->post('idgames')) {
            $rait =\Yii::$app->request->post('rait'); //оценка пользователя
            $idgames = Yii::$app->request->post('idgames'); //id игры
            $validat = new \yii\base\DynamicModel(compact('rait', 'idgames'));
            $validat->addRule(['rait'], 'number', ['max' => 10])
                    ->addRule(['rait'], 'number', ['min' => 0])
                    ->addRule(['idgames'], 'number')
                    ->validate();
            if (!$validat->hasErrors()) {
                $gamesiS = \app\models\Games::findOne(['id' => $idgames]);
                $userRaitingClic = \app\models\Rating::find()
                                ->where(['id_username' => \Yii::$app->user->identity->id, 'id_games' => $idgames])->one();

                $statusIsGames = ($gamesiS and $gamesiS->id) ? true : false;
                $statusIsClicuserRating = ($userRaitingClic and $userRaitingClic->id) ? false : true;
            } else {

                $res['message'] = 'Ошибка голосования попробуйте позже!';

                return json_encode($res, JSON_NUMERIC_CHECK);
            }

            $res = [];

            if (!Yii::$app->user->isGuest and ! $validat->hasErrors() && $statusIsGames && $statusIsClicuserRating) {

                ///avg=100sum/10count
                //$sum= \app\models\Rating::find()->select('sum(rating_to_user)')
                //сохраняем райтинг
                $modelSaveRating = new \app\models\Rating();
                $modelSaveRating->id_username = \Yii::$app->user->identity->id;
                $modelSaveRating->id_games = $idgames;
                $modelSaveRating->rating_to_user = $rait;
                $modelSaveRating->save();
                $avg = \app\models\Rating::find()->select(['avg(rating_to_user) as ratinguser'])->where(['id_games'=> $idgames])->asArray()->all();
                //добавляем среднее в таблицу games round(1.95583, 2); 
                $gamesiS->rating = round($avg[0]['ratinguser'], 1);


                $gamesiS->save(false);

                $res['ratingVotes'] = $gamesiS->rating; //передаем сумму всех голосов по материалу
                //   $res['message'] = 'Этот голос не учитывается. Вы уже проголосовали ранее...';
                return json_encode($res, JSON_NUMERIC_CHECK);
            }

            if ($statusIsGames && !$validat->hasErrors() && !$statusIsClicuserRating) {
                

                $userRaitingClic->rating_to_user = $rait;
                $userRaitingClic->save();
                $avg = \app\models\Rating::find()->select(['avg(rating_to_user) as ratinguser'])->where(['id_games'=> $idgames])->asArray()->all();
                //добавляем среднее в таблицу games round(1.95583, 2); 
                $gamesiS->rating = round($avg[0]['ratinguser'], 1);
                $gamesiS->save(false);
                
                $avgUp = \app\models\Games::findOne(['id'=> $idgames]);
                $res['ratingVotes'] = $avgUp->rating;  //передаем сумму всех голосов по материалу
                //   $res['message'] = 'Этот голос не учитывается. Вы уже проголосовали ранее...';
                return json_encode($res, JSON_NUMERIC_CHECK);
            }
        }
   
    }
    
    public function actionCommentsSend(){
        
        $formModel= new \app\models\forms\CommentForm();
        
        if($formModel->load(Yii::$app->request->post())&&$formModel->validate()){
            $modelComments= new \app\models\Comments();
            $modelComments->content=$formModel->content;
            $modelComments->reply=$formModel->id_commenta;
             $modelComments->id_games=$formModel->id_games;
              $modelComments->login=$formModel->login;
             $modelComments->save(true);
             return \app\components\SendFormComments::widget(['urlSend'=>'/profile/comments-send',
                 'id_games'=>$formModel->id_games,
                     'send'=>true
                     ]);// $this->redirect(['/site/games','id'=>$formModel->id_games]);
             
        }
        
    }

}
