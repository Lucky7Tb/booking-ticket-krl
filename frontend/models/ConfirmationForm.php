<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "history_transaksi".
 *
 * @property int $Id
 * @property int $id_user
 * @property int $jumlah_tiket
 * @property string $tanggal_beli
 * @property int $total_harga
 * @property string $status_bayar
 * @property string $status_pembelian
 * @property int $id_jadwal
 *
 * @property Jadwal $jadwal
 * @property User $user
 */
class ConfirmationForm extends \yii\base\Model
{
    public $bukti;
    public $total_harga;
    public $jumlah_tiket;

    public function rules()
    {
        return [
            ['bukti','file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jumlah_tiket' => 'Jumlah Tiket',
            'total_harga' => 'Total Harga',
            'bukti' => "Foto/ScreenShoot Bukti Transfer"
        ];
    }
}
