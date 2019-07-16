
<?php $form = \yii\bootstrap\ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]) ?>
    <?=\yii\helpers\Html::img(\frontend\components\Common::getUserImage(Yii::$app->user->identity->id)) ?>
    <?=$form->field($model, 'username') ?>
    <?=$form->field($model, 'email') ?>
    <?=\yii\helpers\Html::label('Avatar') ?>
    <?=\yii\helpers\Html::fileInput('avatar') ?>
<?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
<?php \yii\bootstrap\ActiveForm::end() ?>