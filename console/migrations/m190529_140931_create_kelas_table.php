<?php

use yii\db\Migration;

class m190529_140931_create_kelas_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%kelas}}', [
            'id_kelas' => $this->string(11),
            'nama_kelas' => $this->string(11)
        ]);

         $this->addPrimaryKey(
            'PK-kls',
            'kelas',
            'id_kelas'
        );

        $this->insert('kelas',[
            'id_kelas' => 'EK-1',
            'nama_kelas' => 'Ekonomi',
        ]);
        $this->insert('kelas',[
            'id_kelas' => 'EK-2',
            'nama_kelas' => 'Eksekutif',
        ]);
        $this->insert('kelas',[
            'id_kelas' => 'FC-1',
            'nama_kelas' => 'FirstClass',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%kelas}}');
    }
}
