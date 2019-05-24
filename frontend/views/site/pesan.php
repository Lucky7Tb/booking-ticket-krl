<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    $this->title = "Pesan Tiket";
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Perhatian !!!!</h3>
    </div>
    <div class="panel-body">
        Silahkan Upload Pembayaran Melalui Bank : <br>
        No Rek BCA : 0139-0115-5292-501 <br>
        No Rek BRI : 0139-0115-5292-502 <br>
        Lalu Upload Bukti Pembayarannya.
    </div>
    <div class="panel-body">
        Jika Tranfer Tidak di Lakukan Sebelum Pemberangkatan Maka Admin Akan Mengcancel Pesanan Anda !!!
    </div>
</div>

<?php $form = ActiveForm::begin()?>
    <?= $form->field($model, 'atas_nama')?>
    <?= Html::submitButton("Submit", ['class'=>"button1 btn1"])?>
    <?= Html::a("Cancel", ['index'], ['class' => "text-danger"])?>
<?php ActiveForm::end()?>