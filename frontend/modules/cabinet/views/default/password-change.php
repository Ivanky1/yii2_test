<div class="advert-form">

    <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <?=$form->field($model,'password')->passwordInput() ?>
    <?=$form->field($model,'re_password')->passwordInput() ?>


    <?= \yii\helpers\Html::submitButton('Change password', ['class' => 'btn btn-primary']) ?>

    <?php \yii\bootstrap\ActiveForm::end() ?>


    </div>