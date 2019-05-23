<?php
    use yii\helpers\Html;
?>
<div>

    <form>
        <table class="table table-bordered">
            <tr>
                <th>Id Jadwal</th>
                <th>Jumlah Tiket</th>
                <th>Tanggal Beli</th>
                <th>Total Harga</th>
                <th>Status Bayar</th>
                <th>Status Pembelian</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $history):?>
            
            <tr>
                <td><?= $history->id_jadwal ?></td>
                <td><?= $history->jumlah_tiket ?></td>
                <td><?= $history->tanggal_beli ?></td>
                <td><?= $history->total_harga ?></td>
                <td><?= $history->status_bayar ?></td>
                <td><?= $history->status_pembelian ?></td>

                <td>
                    <?php if($history->status_pembelian == "Aktif" && $history->status_bayar == "BB"):?>
                        <?= Html::a("Konfirmasi Pesanan", ['confirmation?id='.base64_encode($history->Id)]) ?>
                    <?php elseif($history->status_pembelian == "Cancel"):?>
                        Anda Membatalkan Pesanan
                    <?php elseif($history->status_pembelian == "Pending"):?>
                        Pesanan Sedang di Konfirmasi
                    <?php elseif($history->status_bayar == "SB" && $history->status_pembelian == "Aktif"):?>
                        <?= Html::a("Download QR Code Tiket", ['download?id='.base64_encode($history->id_karcis)])?>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </form>

</div>