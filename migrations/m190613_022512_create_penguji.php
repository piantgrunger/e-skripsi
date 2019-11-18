<?php

use yii\db\Migration;

class m190613_022512_create_penguji extends Migration
{
    public function up()
    {
       $this->createTable('detailskripsipenguji',[
            'id' => $this->primaryKey(),
            'id_skripsi' => $this->integer(),
            'nip_dosen' => $this->string(50)->notnull(),
        ]);
        $this->addForeignKey('fk_skripsi_penguji','detailskripsipenguji','id_skripsi','skripsi','id','CASCADE','CASCADE');
        

    }

    public function down()
    {
        echo "m190613_022512_create_penguji cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
