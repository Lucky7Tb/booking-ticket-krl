<?php 
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    foreach ($data as $value){
        $model->jumlah_tiket = $value->jumlah_tiket;
        $model->total_harga = $value->total_harga;
    }

    $this->title = "Konfirmasi Pesanan";
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Perhatian !!!!</h3>
    </div>
    <div class="panel-body">
        Silahkan Upload Pembayaran. Admin Akan Mengkonfirmasinya. Lalu Anda Akan Mendapat Kode Tiket Booking
    </div>
</div>

<div>
    <?php $form = ActiveForm::begin(['options'=> ['enctype'=> 'multipart/form-data']])?>
        
        <?= $form->field($model, 'jumlah_tiket')->textInput(['disabled'=>true])?>

        <?= $form->field($model, 'total_harga')->textInput(['disabled'=>true])?>

        <?= $form->field($model, 'bukti')->fileInput()?>

        <?= Html::submitButton("Submit", ['class' => "button1 btn1"])?>

    <?php ActiveForm::end()?>
</div>