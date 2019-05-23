<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use janisto\timepicker\TimePicker;
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis')->dropDownList($namaKereta, ['prompt' => "Pilih Kereta Api"]) ?>

    <?= $form->field($model, 'id_kelas')->dropDownList($kelasKereta, ['prompt' => "Pilih Kelas Kereta"]) ?>

    <?= $form->field($model, 'asal_stasiun')->dropDownList($stasiun) ?>

    <?= $form->field($model, 'tujuan_stasiun')->dropDownList($stasiun) ?>

    <?= $form->field($model, 'waktu_berangkat')->widget(Timepicker::className(),[
        'mode' => 'datetime',
        'clientOptions' => [
            'dateFormat' => "yy-mm-dd",
            'timeFormat' => "HH:mm:ss",
            'showSecond' => true
        ]
    ]) ?>

    <?= $form->field($model, 'waktu_sampai')->widget(TimePicker::className(),[
        'mode' => 'datetime',
        'clientOptions' => [
            'dateFormat' => "yy-mm-dd",
            'timeFormat' => "HH:mm:ss",
            'showSecond' => false
        ]
    ]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'sisa_tiket')->textInput(['type'=>"number"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? "Save" : "Update", ['class' => 'button1 btn1']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>