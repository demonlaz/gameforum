<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GamesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Games';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="games-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Games', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    \yii\widgets\Pjax::begin(['id' => 'games', 'timeout' => 3000]);
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'grid',
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'namegames',
            'namegamesdop',
            'stampgames',
//            'content:ntext',s
            'rating',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::img('/imagesgames/' . $data->globalimag, [
                                'alt' => 'yii2 - картинка в gridview',
                                'style' => 'width:200px;'
                    ]);
                },
            ], [
                'attribute' => 'category_id',
                'label' => 'Категория',
//                'filter' => \app\models\Rubric::getModelsListWhere(),
                'content' => function ($model) {
                    return $model->category->name;
                },
            ],
            'url_dowload:url',
//            'tehnik_trebov:ntext',
            'global:boolean',
//            'popular:boolean',
            ['class' => 'yii\grid\CheckboxColumn',
                'header' => 'Популярные(вкл\выкл)',
                'checkboxOptions' => function($model, $key, $index, $column) {
                    return ['value' => $model->namegames, 'label' => "Включено(" . Yii::$app->formatter->asBoolean($model->popular) . ")"];
                },
            ],
//            'central:boolean',
            ['class' => 'yii\grid\CheckboxColumn',
                'header' => 'Центральная(вкл\выкл)',
                'checkboxOptions' => function($model, $key, $index, $column) {
                    return ['value' => $model->namegames, 'label' => "Включено(" . Yii::$app->formatter->asBoolean($model->central) . ")"];
                },
            ],
                        'date_add:date',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        $ContentRubricmodel = $model->news;
                        return (!empty($ContentRubricmodel)) ?
                                Html::a(
                                        '<span class="glyphicon glyphicon-ban-circle" title="Удалить невозможно игра  используется в новостях!"></span>', "#") :
                                Html::a(
                                        '<span class="glyphicon glyphicon-trash" title="Удалить!"></span>', $url, ['data-confirm' => 'Вы уверены, что хотите удалить этот элемент?']);
                    },],
            ],
        //'date_exit',
        //'date_up',
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
<a id="ttt" style="color:red;"  class="btn btn-warning">Установить как популярные</a>
<a id="ccc" style="color:red;" class="btn btn-warning" >Установить как центральных</a>
    <?php
    \yii\widgets\Pjax::end();

    $js = <<<JS
      $(function(){
        $('#ttt').click(function(){
        var key=$('#grid').yiiGridView('getSelectedRows');
        $.ajax({url:'/admin/games/ajax',
        data:'checkbox='+key,
        success:function(res){
            if(res=='true'){
            alert('Вы обновили ленту с популярными');
                }else{
                    alert('Вы не обновили ленту!');
   }
        
   }
            
   
   });//аджакс
           }); //события
            
            
            
            //центральных
               $('#ccc').click(function(){
        var key=$('#grid').yiiGridView('getSelectedRows');
        $.ajax({url:'/admin/games/ajax-central',
        data:'checkbox='+key,
        success:function(res){
            if(res=='true'){
            alert('Вы обновили ленту центральную');
                }else{
                    alert('Вы не обновили ленту!');
   }
   }
            
   
   });//аджакс
           }); //события
            
   
   });  //глобал
JS;

    $this->registerJs($js);
    ?>