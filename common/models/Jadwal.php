<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "jadwal".
 *
 * @property int $id_jadwal
 * @property int $id_kelas
 * @property int $id_jenis
 * @property int $asal_stasiun
 * @property int $tujuan_stasiun
 * @property string $waktu_berangkat
 * @property string $waktu_tiba
 * @property int $harga
 * @property int $sisa_tiket
 *
 * @property HistoryTransaksi[] $historyTransaksis
 * @property Kelas $kelas
 * @property JenisKereta $jenis
 * @property Stasiun $asalStasiun
 * @property Stasiun $tujuanStasiun
 * @property Karcis[] $karcis
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['harga', 'sisa_tiket'], 'integer' , 'message' => "Form input tidak valid."],
            [['waktu_berangkat', 'waktu_sampai'], 'safe'],
            [['id_kelas', 'id_jenis', 'asal_stasiun', 'tujuan_stasiun'], 'string'],
            [['sisa_tiket'], 'required'],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
            [['id_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKereta::className(), 'targetAttribute' => ['id_jenis' => 'id_kereta']],
            [['asal_stasiun'], 'exist', 'skipOnError' => true, 'targetClass' => Stasiun::className(), 'targetAttribute' => ['asal_stasiun' => 'id_stasiun']],
            [['tujuan_stasiun'], 'exist', 'skipOnError' => true, 'targetClass' => Stasiun::className(), 'targetAttribute' => ['tujuan_stasiun' => 'id_stasiun']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Kelas',
            'id_jenis' => 'Kereta Api',
            'asal_stasiun' => 'Asal Stasiun',
            'tujuan_stasiun' => 'Tujuan Stasiun',
            'waktu_berangkat' => 'Waktu Berangkat',
            'waktu_sampai' => 'Waktu Sampai',
            'harga' => 'Harga',
            'sisa_tiket' => 'Tiket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryTransaksis()
    {
        return $this->hasMany(HistoryTransaksi::className(), ['id_jadwal' => 'id_jadwal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(JenisKereta::className(), ['id_kereta' => 'id_jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsalStasiun()
    {
        return $this->hasOne(Stasiun::className(), ['id_stasiun' => 'asal_stasiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTujuanStasiun()
    {
        return $this->hasOne(Stasiun::className(), ['id_stasiun' => 'tujuan_stasiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarcis()
    {
        return $this->hasMany(Karcis::className(), ['id_tiket' => 'id_jadwal']);
    }
}
