<?php

namespace frontend\models;

use Yii;
use backend\models\Kelas;
use backend\models\JenisKereta;
use backend\models\Stasiun;
use yii\base\Model;

class TicketSearch extends Model
{
    public $orang; 
    public $waktu; 
    public $tujuanstasiun; 
    public $asalstasiun; 
    public $kereta; 
    public $kelas; 

    public function rules()
    {
        return [
            [['orang', 'waktu', 'tujuanstasiun', 'asalstasiun', 'kereta', 'kelas'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'orang' => 'Orang',
            'waktu' => 'Waktu Berangkat',
            'asalstasiun' => 'Asal Stasiun',
            'tujuanstasiun' => 'Tujuan Stasiun',
            'waktu' => 'Waktu Berangkat',
            'kereta' => 'Kereta',
            'kelas' => 'Kelas Kereta',
        ];
    }
    
}
