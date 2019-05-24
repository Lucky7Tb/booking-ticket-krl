<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use janisto\timepicker\TimePicker;
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(['options'=>['class'=>'form']]); ?>
    
    <div class="row" data-aos="fade">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'id_jenis')->dropDownList($namaKereta, ['prompt' => "Pilih Kereta Api"]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'id_kelas')->dropDownList($kelasKereta, ['prompt' => "Pilih Kelas Kereta"]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'asal_stasiun')->dropDownList($stasiun) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'tujuan_stasiun')->dropDownList($stasiun) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'harga')->textInput() ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'sisa_tiket')->textInput(['type'=>"number"]) ?>
        </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'waktu_berangkat')->widget(Timepicker::className(),[
                'mode' => 'datetime',
                'clientOptions' => [
                    'dateFormat' => "yy-mm-dd",
                    'timeFormat' => "HH:mm:ss",
                    'showSecond' => false
                ]
            ]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <?= $form->field($model, 'waktu_sampai')->widget(TimePicker::className(),[
                'mode' => 'datetime',
                'clientOptions' => [
                    'dateFormat' => "yy-mm-dd",
                    'timeFormat' => "HH:mm:ss",
                    'showSecond' => false
                ]
            ]) ?>
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? "Save" : "Update", ['class' => 'button1 btn1']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>