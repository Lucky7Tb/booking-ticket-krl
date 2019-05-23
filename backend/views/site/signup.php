<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\captcha\Captcha;

    $this->title = 'Register Admin';
?>
<div class="site-signup">
    <h3 class="text-center">Registrasi Admin Baru</h3>
    <div class="row">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="col-sm-offset-2 col-sm-8 col-lg-offset-2 col-lg-8">
                    <?= $form->field($model, 'username')->textInput(['placeholder' => "example123",'autofocus' => true]) ?>
                </div>

                <div class="col-sm-offset-2 col-sm-8 col-lg-offset-2 col-lg-8">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => "example@example.com"])?>
                </div>

                <div class="col-sm-offset-2 col-sm-8 col-lg-offset-2 col-lg-8">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>

                <div class="col-lg-offset-2 col-lg-3 col-sm-offset-2 col-sm-2">
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'button1 btn1', 'name' => 'signup-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>
