<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stasiun".
 *
 * @property int $id_stasiun
 * @property string $nama_stasiun
 * @property string $kota
 *
 * @property Jadwal[] $jadwals
 * @property Jadwal[] $jadwals0
 */
class Stasiun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stasiun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_stasiun'], 'string', 'max' => 30],
            [['kota'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stasiun' => 'Id Stasiun',
            'nama_stasiun' => 'Nama Stasiun',
            'kota' => 'Kota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['asal_stasiun' => 'id_stasiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals0()
    {
        return $this->hasMany(Jadwal::className(), ['tujuan_stasiun' => 'id_stasiun']);
    }
}
