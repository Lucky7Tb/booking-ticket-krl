<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jadwal;

class JadwalSearch extends Jadwal
{
    public function rules()
    {
        return [
            [['harga', 'sisa_tiket'], 'integer'],
            [['id_kelas', 'id_jenis', 'asal_stasiun', 'tujuan_stasiun'],'string'],
            [['waktu_berangkat', 'waktu_sampai'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Jadwal::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [ 'pageSize' => 20 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_jadwal' => $this->id_jadwal,
            'id_kelas' => $this->id_kelas,
            'id_jenis' => $this->id_jenis,
            'asal_stasiun' => $this->asal_stasiun,
            'tujuan_stasiun' => $this->tujuan_stasiun,
            'waktu_berangkat' => $this->waktu_berangkat,
            'waktu_sampai' => $this->waktu_sampai,
            'harga' => $this->harga,
            'sisa_tiket' => $this->sisa_tiket,
        ]);

        return $dataProvider;
    }
}