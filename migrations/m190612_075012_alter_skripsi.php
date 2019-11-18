<?php

use yii\db\Migration;

class m190612_075012_alter_skripsi extends Migration
{
    public function up()
    {
        $this->addColumn('skripsi','id_ruang',$this->integer());
        $this->addColumn('skripsi','tanggal_sidang',$this->date());
        $this->addColumn('skripsi','jam_sidang',$this->time());
         $this->addForeignKey('fk_skripsi_ruang','skripsi','id_ruang','ruang','id');
       
      
 

    }

    public function down()
    {
        echo "m190612_075012_alter_skripsi cannot be reverted.\n";

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
