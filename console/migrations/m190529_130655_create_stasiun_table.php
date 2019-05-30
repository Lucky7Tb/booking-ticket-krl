<?php

use yii\db\Migration;

class m190529_130655_create_stasiun_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('{{%stasiun}}', [
            'id_stasiun' => $this->string(11),
            'nama_stasiun' => $this->string(30),
            'kota' => $this->string(20),
        ]);

        $this->addPrimaryKey(
            'PK-stsn',
            'stasiun',
            'id_stasiun'
        );

        $this->insert('stasiun',[
            'id_stasiun'=>'ST-B BDG',
            'nama_stasiun' =>'Stasiun Bandung',
            'kota' => "Bandung",
        ]);
        $this->insert('stasiun',[
            'id_stasiun'=>'ST-BKN MD',
            'nama_stasiun' =>'Stasiun Bandar Kuala Namu',
            'kota' => 'Medan',
        ]);
        $this->insert('stasiun',[
            'id_stasiun'=>'ST-G JKT',
            'nama_stasiun' => 'Stasiun Gambir',
            'kota' => "Jakarta",
        ]);
        $this->insert('stasiun',[
            'id_stasiun'=>'ST-SB SL',
            'nama_stasiun' =>'Stasiun Solo Balapan',
            'kota' => "Solo",
        ]);
        $this->insert('stasiun',[
            'id_stasiun'=>'ST-Y YKT',
            'nama_stasiun' =>'Stasiun Yogyakarta',
            'kota' => 'Yogyakarta',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%stasiun}}');
    }
}
