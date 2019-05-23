<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jenis_kereta".
 *
 * @property int $id_kereta
 * @property string $nama_kereta
 *
 * @property Jadwal[] $jadwals
 */
class JenisKereta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kereta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kereta'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kereta' => 'Id Kereta',
            'nama_kereta' => 'Nama Kereta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['id_jenis' => 'id_kereta']);
    }
}
