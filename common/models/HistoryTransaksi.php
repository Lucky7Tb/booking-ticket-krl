<?php

namespace common\models;

use Yii;
use frontend\models\User;

class HistoryTransaksi extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'history_transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'jumlah_tiket', 'tanggal_beli', 'total_harga', 'status_bayar', 'status_pembelian', 'id_jadwal'], 'required'],
            [['id_user', 'jumlah_tiket', 'total_harga', 'id_jadwal'], 'integer'],
            [['tanggal_beli'], 'safe'],
            [['status_bayar', 'status_pembelian'], 'string'],
            // [['id_jadwal'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['id_jadwal' => 'id_jadwal']],
            // [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'id_user' => 'Id User',
            'jumlah_tiket' => 'Jumlah Tiket',
            'tanggal_beli' => 'Tanggal Beli',
            'total_harga' => 'Total Harga',
            'status_bayar' => 'Status Bayar',
            'status_pembelian' => 'Status Pembelian',
            'id_jadwal' => 'Id Jadwal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['id_jadwal' => 'id_jadwal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
