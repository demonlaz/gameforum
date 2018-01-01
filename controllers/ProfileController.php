<?php

namespace app\controllers;

class ProfileController extends SiteController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionMessages(){
        
       return $this->render('messages');
    }

}
