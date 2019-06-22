<?php

use yii\db\Migration;

class m190529_130057_create_admin_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'verification_token' => $this->string()->defaultValue(null)
        ]);

        $this->insert("admin",[
            'username' => 'Lucky',
            'auth_key' => 'S0EB3EQAH2SsHHW21LNHZ7dX4VknvW-K',
            'password_hash' => '$2y$13$nK1jK5UIDpK.oMEJThM0MeaBncNce5ZfDHz2vQ6559NcFoTEUcgQG',
            'email' => "admin@example.com",
            'status' => '1',
            'created_at' => "1558499213",
            'updated_at' => "1558499213",
            'verification_token' => "vmsgrg2idSGvPS6_HstP8edBnapx2Os6_1558499213"
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%admin}}');
    }
}
