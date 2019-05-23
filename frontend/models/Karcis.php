<?php

namespace frontend\models;

use Yii;

class Karcis extends \yii\base\Model
{

    public $atas_nama;
    
    public function rules()
    {
        return [
            [['atas_nama'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'atas_nama' => 'Atas Nama',
        ];
    }

}
