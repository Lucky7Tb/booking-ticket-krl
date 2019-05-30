<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jenis_kereta}}`.
 */
class m190529_141415_create_jenis_kereta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jenis_kereta}}', [
            'id_kereta' => $this->string(30),
            'nama_kereta' => $this->string(30),
        ]);

         $this->addPrimaryKey(
            'PK-krt',
            'jenis_kereta',
            'id_kereta'
        );

        $this->insert('jenis_kereta',[
            'id_kereta' => "KA-ABA-1",
            'nama_kereta' => "KA Argo Bromo Anggrek"
        ]);
        $this->insert('jenis_kereta',[
            'id_kereta' => "KA-ADAL-1",
            'nama_kereta' => "KA Argo Dwipanggadan Argo Lawu"
        ]);
        $this->insert('jenis_kereta',[
            'id_kereta' => "KA-AMRS-1",
            'nama_kereta' => "KA Argo Muria dan Argo Sindoro"
        ]);
        $this->insert('jenis_kereta',[
            'id_kereta' => "KA-AW-1",
            'nama_kereta' => "KA Argo Wilis"
        ]);
        $this->insert('jenis_kereta',[
            'id_kereta' => "KA-NAJ-1",
            'nama_kereta' => "KA New Argo Jati"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jenis_kereta}}');
    }
}
