<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /*
     *   Категории принемает id
     * */

    public function actionCategory($id = 1) {

//        echo "<script>alert('.$id.');</script>";
        if (is_numeric($id)) {
            $query = \app\models\Games::find()->where('category_id=:category_id', [':category_id' => $id])->orderBy('namegames');

            $paginations = new \yii\data\Pagination(['totalCount' => $query->count()]);

            $model = $query->offset($paginations->offset)->limit($paginations->limit)->all();
            $modelCategoryName = \app\models\Category::findOne($id);
            return $this->render('category', ['model' => $model, 'paginations' => $paginations, 'modelCategoryName' => $modelCategoryName]);
        } else {

           
        }
    }

    public function actionGames($id = 1) {

        if (is_numeric($id)) {
        $model= \app\models\Games::findOne($id);
        $category= \app\models\Category::findOne($model->category_id);
      
              return $this->render('games', ['model'=>$model,'category'=>$category]);
        } else {
             return $this->redirect(['/site/index']);
        }

      
    }
    
    public function actionSearch($search=null){
        
        $model= new \app\models\SearchForm();
         if ($model->validate()) {
           $modelsGames= \app\models\Games::find()->where(['like','namegames', \yii\helpers\Html::encode($search)])->indexBy('id')->asArray()->all();
           $modelsNews= \app\models\News::find()->where(['like','title', \yii\helpers\Html::encode($search)])->all();
           return $this->render('search',['model'=>$model,'modelsGames'=>$modelsGames,'modelsNews'=>$modelsNews]);
         }else{
              return $this->render('search',['model'=>$model]);
         }
        
       
    }

}
