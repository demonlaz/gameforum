<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Games */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="games-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'namegames',
            'namegamesdop',
            'stampgames',
            'rating',
            'globalimag',
            'content:ntext',
            'url_dowload:url',
            'tehnik_trebov:ntext',
            'global:boolean',
            'popular:boolean',
            'central:boolean',
            'date_exit',
            'date_add',
            'date_up',
            'category_id',
        ],
    ]) ?>

</div>
