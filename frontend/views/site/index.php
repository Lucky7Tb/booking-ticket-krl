<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use janisto\timepicker\TimePicker;
$this->title = 'Home';
?>

<div class="jumbotron">
    <h1>Selamat Datang!</h1>
    <p class="Typed" style="display:inline;"></p>
</div>

<div class="site-index" data-aos="zoom-in-left">

    <?php $form = ActiveForm::begin()?>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'asalstasiun')->dropDownList($stasiun)?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'tujuanstasiun')->dropDownList($stasiun)?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'kelas')->dropDownList($kelasKereta)?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'kereta')->dropDownList($namaKereta)?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'orang')->dropDownList([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                ],[ 'prompt' => "Jumlah Tiket"])?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'waktu')->widget(Timepicker::className(),[
                    'mode' => 'datetime',
                    'clientOptions' => [
                        'dateFormat' => "yy-mm-dd",
                        'timeFormat' => "HH:mm:ss",
                        'showSecond' => false
                    ]
                ]) ?>
            </div>
            <div class="col-lg-2">
                <?= Html::submitButton("Search", ['class'=>"button1 btn1"])?>
            </div>
        </div>
    
    <?php ActiveForm::end()?>

    <form>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped" data-aos="flip-left">
                <tr>
                    <th>Kelas</th>
                    <th>Kereta</th>
                    <th>Asal Stasiun</th>
                    <th>Tujuan Stasiun</th>
                    <th>Waktu Berangkat</th>
                    <th>Waktu Sampai</th>
                    <th>Harga</th>
                    <th>Tiket</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach($jadwalKereta as $jadwal):?>
                    <tr>
                        <td><?= Html::decode($jadwal->kelas['nama_kelas'])?></td>
                        <td><?= Html::decode($jadwal->jenis['nama_kereta'])?></td>
                        <td><?= Html::decode($jadwal->asalStasiun['nama_stasiun'])?></td>
                        <td><?= Html::decode($jadwal->tujuanStasiun['nama_stasiun'])?></td>
                        <td><?= Html::decode($jadwal->waktu_berangkat)?></td>
                        <td><?= Html::decode($jadwal->waktu_sampai)?></td>
                        <td><?= Html::decode($jadwal->harga)?></td>
                        <td><?= Html::decode($jadwal->sisa_tiket)?></td>
                        <td><?= Html::a("Pesan", ['pesan?id='.base64_encode($jadwal->id_jadwal).'&tkt='.base64_encode($model->orang) ])?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </form>
</div>


<?php
    $script = <<<JS

    var typed2 = new Typed('.Typed', {
        strings: ['Situs Booking <strong>Terbaik</strong>', 'Situs Booking <strong>Tercepat</strong>','Situs Booking <strong>Termurah</strong>'],
        typeSpeed: 70,
        backSpeed: 65,
        startDelay: 500,
        smartBackspace: true,
        loop: true
    });
        
    JS;
$this->registerJs($script);