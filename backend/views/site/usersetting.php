<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\widgets\Pjax;
    $this->title = "Konfirmasi User";
?>

<h3>Daftar Pembayaran User</h3>
<div>
    <form>
        <?php Pjax::begin()?>
        <table class="table table-bordered text-center table-striped table-responsive">
            <tr>
                <th style="text-align: center">User</th>
                <th style="text-align: center">Id Jadwal</th>
                <th style="text-align: center">Tanggal Beli</th>
                <th style="text-align: center">Total Harga</th>
                <th style="text-align: center">Status Bayar</th>
                <th style="text-align: center">Status Pembelian</th>
                <th style="text-align: center">Bukti Pembayaran</th>
                <th style="text-align: center">Aksi</th>
            </tr>
            <?php foreach($data as $historyUser):?>
                <tr>
                    <td><?= Html::encode($historyUser->user['username'])?></td>
                    <td><?= Html::encode($historyUser->id_jadwal)?></td>
                    <td><?= Html::encode($historyUser->tanggal_beli)?></td>
                    <td><?= Html::encode($historyUser->total_harga)?></td>
                    <td><?= Html::encode($historyUser->status_bayar)?></td>
                    <td><?= Html::encode($historyUser->status_pembelian)?></td>
                    <td>        
                        <?= Html::img('../../web/bukti/'.$historyUser->bukti_pembayaran, ['width'=>100])?>
                    </td>
                    <td>
                        <?php if($historyUser->status_pembelian == "Cancel"):?>
                            Anda Mengcancel Pesanan
                        <?php elseif($historyUser->status_pembelian == "Pending" && $historyUser->status_bayar == "SB"):?>
                            <?= Html::a("Confirmasi Pesanan", ['confirmasi?confir='.base64_encode($historyUser->Id)], ['data'=>['confirm'=> "Confirmasi?"]])?> ||
                            <?= Html::a("Cancel", ['confirmasi?confir='.base64_encode($historyUser->Id)], ['data'=>[
                            'confirm' => "Yakin Mengcancelnya ?"
                        ]])?>
                        <?php elseif ($historyUser->status_pembelian == "Aktif" && $historyUser->status_bayar == "SB"):?>
                                User Sudah Di Konfirmasi
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
        <?php Pjax::end()?>
    </form>
</div>