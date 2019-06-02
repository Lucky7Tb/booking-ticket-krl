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
         if ($this->db->driverName === 'pgsql') {
            $this->execute("CREATE TYPE st_byr AS ENUM ('SB', 'BB')");
            $this->execute("CREATE TYPE st_pbl AS ENUM ('Aktif', 'Pending', 'Cancel')");
            $enum1 = "st_byr";
            $enum2 = "st_pbl";
        }else{
            $enum1 = "ENUM('SB','BB')";
            $enum2 = "ENUM('Aktif','Pending', 'Cancel')";
        }

        $this->createTable('{{%history_transaksi}}', [
            'Id' => $this->primaryKey(),
            'id_user' => $this->integer(11),
            'id_jadwal' => $this->integer(11),
            'id_karcis' => $this->integer(255),
            'atas_nama' => $this->string(255),
            'jumlah_tiket' => $this->integer(11),
            'tanggal_beli' => $this->dateTime(),
            'total_harga' => $this->integer(255),
            'status_bayar' => $enum1,
            'status_pembelian' => $enum2,
            'bukti_pembayaran' => $this->string(255),
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

    public function safeDown()
    {
        $this->dropTable('{{%history_transaksi}}');
    }
}
