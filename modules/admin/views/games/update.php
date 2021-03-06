<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Games */

$this->title = 'Обновляем игру:' . $model->namegames;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="games-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'imagesModel' => $imagesModel,
        'skrin' => $skrin,
         'baner' => $baner
    ])
    ?>

</div>
