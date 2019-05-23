<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form of `backend\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['harga', 'sisa_tiket'], 'integer'],
            [['id_kelas', 'id_jenis', 'asal_stasiun', 'tujuan_stasiun'],'string'],
            [['waktu_berangkat', 'waktu_sampai'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Jadwal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [ 'pageSize' => 20 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
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