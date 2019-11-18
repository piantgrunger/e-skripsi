<?php

use yii\db\Migration;

class m190416_014801_create_table_skripsi extends Migration
{
    public function up()
    {
        $this->createTable('skripsi',[
            'id' => $this->PrimaryKey(),
            'nim' => $this->string(50)->notNull(),
            'judul_skripsi' => $this->text()->notNull(),
            'proposal' => $this->string(50),
            'kartu_bimbingan' => $this->string(50) ,
            

        ]);

        $this->createTable('detailskripsipembimbing',[
            'id' => $this->primaryKey(),
            'id_skripsi' => $this->integer(),
            'nip_dosen' => $this->string(50)->notnull(),
            'validasi_sempro' => $this->string(20)->notNull()->defaultValue("Belum Validasi"),
        ]);
        $this->addForeignKey('fk_skripsi_pembimbing','detailskripsipembimbing','id_skripsi','skripsi','id','CASCADE','CASCADE');
        

    }

    public function down()
    {
    
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
