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
                ->having(['readContent' => 0, 'loginTo' => \Yii::$app->user->identity->username])
                ->asArray()
                ->all();
        $fullCount = \app\models\Messages::find()->where(['loginTo' => \Yii::$app->user->identity->username, 'readContent' => 0])->count();
//select loginFrom,count(loginFrom ) as con,readContent from messages group by loginFrom,readContent,loginTo having readContent is null and loginTo='demonlaz'
        return $this->render('messages', ['modelMessagesLogin' => $modelMessagesLogin,
                    'modelMessagesContent' => $modelMessagesContent,
                    'modelMessagesCount' => $modelMessagesCount,
                    'fullCount' => $fullCount
        ]);
    }

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
            if(!empty($name)){
            \app\models\Messages::updateAll(['readContent' => 1], ['readContent' => 0,
                'loginTo' => \Yii::$app->user->identity->username,
                'loginFrom' => $name]);
            return json_encode(true);
            }else{
                return json_encode(false);
            }


            
        }
    }

}
