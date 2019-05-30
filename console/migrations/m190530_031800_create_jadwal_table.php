<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jadwal}}`.
 */
class m190530_031800_create_jadwal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jadwal}}', [
            'id_jadwal' => $this->primaryKey(),
            'id_kelas' => $this->string(11),
            'id_jenis' => $this->string(11),
            'asal_stasiun'=> $this->string(11),
            'tujuan_stasiun' => $this->string(11),
            'waktu_berangkat' => $this->dateTime(),
            'waktu_sampai' => $this->dateTime(),
            'harga' => $this->integer(20),
            'sisa_tiket' => $this->integer(20)
        ]);

        $this->createIndex(
            "idx-idkls-jadwal",
            'jadwal',
            'id_kelas',
        );

        $this->createIndex(
            "idx-idjns-jadwal",
            'jadwal',
            'id_jenis',
        );

        $this->createIndex(
            "idx-stasiunasl-jadwal",
            'jadwal',
            'asal_stasiun',
        );

        $this->createIndex(
            "idx-stasiunyjn-jadwal",
            'jadwal',
            'tujuan_stasiun',
        );

        $this->addForeignKey(
            'fk-idkls-jadwal',
            'jadwal',
            'id_kelas',
            'kelas',
            'id_kelas',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-idjns-jadwal',
            'jadwal',
            'id_jenis',
            'jenis_kereta',
            'id_kereta',
            'CASCADE',
            'CASCADE'
        );

         $this->addForeignKey(
            'fk-stasiunasl-jadwal',
            'jadwal',
            'asal_stasiun',
            'stasiun',
            'id_stasiun',
            'CASCADE',
            'CASCADE'
        );

         $this->addForeignKey(
            'fk-stasiuntjn-jadwal',
            'jadwal',
            'tujuan_stasiun',
            'stasiun',
            'id_stasiun',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jadwal}}');
    }
}
