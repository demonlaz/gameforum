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

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'namegames',
            'namegamesdop',
            'stampgames',
//            'content:ntext',s
            'rating',
            //'/imagesgames/'.'globalimag:image',
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
            'tehnik_trebov:ntext',
            'global:boolean',
            'popular:boolean',
            'central:boolean',
            //'date_exit',
            'date_add:date',
            //'date_up',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
