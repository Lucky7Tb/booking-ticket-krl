<?php

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Login';
?>
<div class="site-login">
    <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <div class="col-sm-offset-2 col-sm-8 col-lg-offset-2 col-lg-8">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            </div>

            <div class="col-sm-offset-2 col-sm-8 col-lg-offset-2 col-lg-8">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>

            <div class="col-lg-offset-2 col-lg-3 col-sm-offset-2 col-sm-2">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'button1 btn1', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
