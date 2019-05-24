<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup" data-aos="flip-left">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?= $form->field($model, 'username')->textInput(['placeholder' => "example123",'autofocus' => true]) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?= $form->field($model, 'email')->textInput(['placeholder' => "example@example.com"])?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?= $form->field($model, 'alamat')->textInput(['placeholder' => "Jln. Setiabudi No.12"])?>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-4">
                <?= $form->field($model, 'notelfon')->textInput(['placeholder'=>"08xxxxxxxxx"])?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?= $form->field($model, 'provinsi')->textInput(['placeholder'=>"e.g Jawa Barat"])?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-6 col-md-4 col-sm-6">
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-4">{input}</div></div>',
                ]) ?>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <?= Html::submitButton('Signup', ['class' => 'button1 btn1', 'name' => 'signup-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
