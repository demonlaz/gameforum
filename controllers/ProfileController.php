<?php

namespace app\controllers;

use yii\filters\AccessControl;

class ProfileController extends SiteController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'messages'],
                'rules' => [
                    [
                        'actions' => ['index', 'messages'],
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
                ->having(['readContent' => null, 'loginTo' => \Yii::$app->user->identity->username])
                ->asArray()
                ->all();
        $fullCount= \app\models\Messages::find()->where(['loginTo'=>\Yii::$app->user->identity->username,'readContent'=>null])->count();
//select loginFrom,count(loginFrom ) as con,readContent from messages group by loginFrom,readContent,loginTo having readContent is null and loginTo='demonlaz'
        return $this->render('messages', ['modelMessagesLogin' => $modelMessagesLogin,
                    'modelMessagesContent' => $modelMessagesContent,
                    'modelMessagesCount' => $modelMessagesCount,
                'fullCount'=>$fullCount
        ]);
    }

}
