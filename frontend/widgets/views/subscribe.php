<?php
$form  = \yii\bootstrap\ActiveForm::begin([
    'enableAjaxValidation' => true,
    'validationUrl' => \yii\helpers\Url::to(['/validate/subscribe']),
    'options' => ['class' => 'form-inline'],
]);
?>
<?=$form->field($model, 'email')->textInput(['placeholder' => 'Введите емайл'])->label(false); ?>
<?=\yii\helpers\Html::submitButton('Subscribe',['class' => 'btn btn-success']) ?>

<?php \yii\bootstrap\ActiveForm::end(); ?>