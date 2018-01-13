<?php

use yii\bootstrap\ActiveForm;

yii\widgets\Pjax::begin(['id' => 'sdfdf', 'timeout' => 7000, 'enablePushState' => false]);
if ($error == true) {
    echo "<span style='color:red;'>Сообщение не было добавлено!</span>";
}

if ($send == true) {
    echo "<span style='color:green;'>Сообщение добавлено!</span>";
}
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => [$urlSend],
            'options' => ['data-pjax' => true, 'style' => 'color:white;font-size:16px;']
        ]);
$options = ['style' => "color:white;"]
?>
    <?= $form->field($modelForm, 'id_games')->hiddenInput(['value' => $id_games])->label('') ?>
    <?= $form->field($modelForm, 'id_commenta')->hiddenInput(['value' => 0,'id'=>'hiddeninputcomment'])->label('') ?>
<div class="youplay-textarea">
<?= $form->field($modelForm, 'content')->textarea(['placeholder' => "Сообщение", 'rows' => 8])->label('') ?>

</div>
<button class="btn btn-default">Отправить</button>

<?php
$form::end();
yii\widgets\Pjax::end();
?>