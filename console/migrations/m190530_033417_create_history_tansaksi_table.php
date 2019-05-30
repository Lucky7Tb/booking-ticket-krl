<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history_tansaksi}}`.
 */
class m190530_033417_create_history_tansaksi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history_transaksi}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(11),
            'id_jadwal' => $this->integer(11),
            'id_karcis' => $this->integer(255),
            'atas_nama' => $this->string(255),
            'jumlah_tiket' => $this->integer(11),
            'tanggal_beli' => $this->dateTime(),
            'total_harga' => $this->integer(255),
            'status_bayar' => "ENUM('SB','BB')",
            'status_pembelian' => "ENUM('Aktif','Pending', 'Cancel')",
            'buktipembayaran' => $this->string(255),
        ]);

        $this->createIndex(
            'id-idusr-hs',
            'history_transaksi',
            'id_user'
        );

        $this->createIndex(
            'id-idjdwl-hs',
            'history_transaksi',
            'id_jadwal'
        );

        $this->addForeignKey(
            'fk-idusr-hs',
            'history_transaksi',
            'id_user',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-idjdwl-hs',
            'history_transaksi',
            'id_jadwal',
            'jadwal',
            'id_jadwal',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%history_transaksi}}');
    }
}
