<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models\forms;

/**
 * Description of CommentForm
 *
 * @author demon
 */
class CommentForm extends \yii\base\Model {

    public $content;
    public $id_commenta;
    public $login;
 public $id_games;
    public function rules() {
        return [
            [['content'], 'required'],
            [['id_commenta', 'id_games'], 'number'],
            [['content'], 'string', 'max' => 1000],
            [['login'],'default', 'value' => \Yii::$app->user->identity->username],
            [['id_commenta'], 'filter', 'filter' => function($value) {

                    $returnModel = \app\models\Comments::findOne(['id' => $value]);

                    return ($returnModel and $returnModel->id) ? $returnModel->id : 0;
                }],
        ];
    }
    
    public function attributeLabels() {
        return[
           'content'=>"Комментарий" 
        ];
    }

}
