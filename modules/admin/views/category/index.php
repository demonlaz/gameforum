<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
\yii\widgets\Pjax::begin(['id'=>'category']);
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
    \yii\widgets\Pjax::begin(['id'=>'category','timeout'=>3000]);
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
           
            'name',
            [
                'attribute'=>'Count Games',
                'value'=>'games'
            ],

            ['class' => 'yii\grid\ActionColumn',
                  'buttons' => [
                'delete' => function ($url,$model) {
                    $ContentRubricmodel=$model->games;
                    return (!empty($ContentRubricmodel))? 
                    Html::a(
                    '<span class="glyphicon glyphicon-ban-circle" title="Удалить невозможно категория используется!"></span>', 
                    "#"):                 
                    Html::a(
                    '<span class="glyphicon glyphicon-trash" title="Удалить!"></span>', 
                    $url,['data-confirm'=>'Вы уверены, что хотите удалить этот элемент?']);
                },],
                
                 
                ],
        ],
    ]); ?>
    <?php 
\yii\widgets\Pjax::end();
?>
</div>
