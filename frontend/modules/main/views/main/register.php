<div class="spacer">
    <div class="row register">
        <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
            <?php $form =  \yii\bootstrap\ActiveForm::begin(); ?>
            <?=$form->field($model, 'username') ?>
            <?=$form->field($model, 'email') ?>
            <?=$form->field($model, 'password')->passwordInput() ?>
            <?=$form->field($model, 'repassword')->passwordInput() ?>
            <?=\yii\helpers\Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
            <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                'captchaAction' => \yii\helpers\Url::to(['captcha']),
            ]) ?>
            <?php \yii\bootstrap\ActiveForm::end(); ?>
        </div>

    </div>
</div>