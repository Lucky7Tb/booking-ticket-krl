<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use janisto\timepicker\TimePicker;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php $form = ActiveForm::begin()?>
        <?= $form->field($model, 'asalstasiun')->dropDownList($stasiun)?>

        <?= $form->field($model, 'tujuanstasiun')->dropDownList($stasiun)?>

        <?= $form->field($model, 'kelas')->dropDownList($kelasKereta)?>

        <?= $form->field($model, 'kereta')->dropDownList($namaKereta)?>

        <?= $form->field($model, 'orang')->dropDownList([
                1 => '1',
                2 => '2',
                3 => '3',
        ],[ 'prompt' => "Jumlah Tiket"])?>

        <?= $form->field($model, 'waktu')->widget(Timepicker::className(),[
            'mode' => 'datetime',
            'clientOptions' => [
                'dateFormat' => "yy-mm-dd",
                'timeFormat' => "HH:mm:ss",
                'showSecond' => false
            ]
        ]) ?>

        <?= Html::submitButton("Search", ['class'=>"btn btn-info"])?>

    <?php ActiveForm::end()?>
    <form>
        <table class="table table-bordered">
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
    </form>

</div>
