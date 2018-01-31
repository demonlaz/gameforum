<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Games;
use app\models\GamesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GamesController implements the CRUD actions for Games model.
 */
class GamesController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => [],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        // 'roles'=>['?'],
                        'matchCallback' => function($rule, $action) {
                            return !empty(Yii::$app->user->identity->isAdmin);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Games models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GamesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Games model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Games model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Games();
        $imagesModel = new \app\models\Images();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $this->uploadImages($model);
            //------------------------------------
            if ($imagesModel->load(Yii::$app->request->post())) {
                $imagesModel->uploadArrImages = \yii\web\UploadedFile::getInstances($imagesModel, 'uploadArrImages');

                if ($imagesModel->upload($model->id)) {
//                damp($imagesModel->uploadArrImages);
                }
            }
            return $this->redirect(['index', 'id' => $model->id]);
        }

        // 


        return $this->render('create', [
                    'model' => $model,
                    'imagesModel' => $imagesModel
        ]);
    }

    /**
     * Updates an existing Games model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $imagesModel = new \app\models\Images();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $this->uploadImages($model);
            if ($imagesModel->load(Yii::$app->request->post())) {
                $imagesModel->uploadArrImages = \yii\web\UploadedFile::getInstances($imagesModel, 'uploadArrImages');

                if ($imagesModel->upload($model->id)) {
//                damp($imagesModel->uploadArrImages);
                }
            }


            return $this->redirect(['index', 'id' => $model->id]);
        }
            $baner= Games::findOne($id);
           $skrin= \app\models\Images::findAll(['id_parent_games'=>$id]);
        return $this->render('update', [
                    'model' => $model,
            'imagesModel'=>$imagesModel,
                'skrin'=>$skrin,
                'baner'=>$baner
        ]);
    }

    /**
     * Deletes an existing Games model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
      
            \app\models\Comments::deleteAll(['id_games' => $id]);
            \app\models\News::deleteAll(['id_games' => $id]);
            \app\models\Images::deleteAll(['id_parent_games' => $id]);
            $this->findModel($id)->delete();
       
        return $this->redirect(['index']);
    }

    /**
     * Finds the Games model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Games the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Games::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    /* @var $checkbox array */
 public function actionAjax(){
     
 if($checkbox=\Yii::$app->request->get('checkbox')){
  $checkbox= explode(',', $checkbox);
 $model= Games::find()->where(['in','id',$checkbox])->all();
     foreach ($model as $value) {
         $value->popular=($value->popular==1)?false:true;
         $value->save(false);
     }
     
return \yii\helpers\Json::encode(true);  
 }else
 {
     return (new NotFoundHttpException('Ошибка')); 
 }

//        if(\Yii::$app->request->post()==\Yii::$app->request->isAjax){
//            
//        }else
//        {return false;}
      
        
    }
    /* @var $model object
     * @throws имя картинки
     *  */

    protected function uploadImages($model) {
        $model->uploadImage = \yii\web\UploadedFile::getInstance($model, 'uploadImage');
        $path = Yii::$app->params['pathUploads'] . 'imagesgames/';
        if (!empty($model->uploadImage->name)) {
            $md5 = md5(time());
            $model->uploadImage->name = $md5 . $model->uploadImage->name;
            $model->globalimag = $model->uploadImage->name;

            $model->save();

            $model->uploadImage->saveAs($path . $model->uploadImage);
        } else {
            new NotFoundHttpException('Имя картинки не обнаружено');
        }
    }
   
}
