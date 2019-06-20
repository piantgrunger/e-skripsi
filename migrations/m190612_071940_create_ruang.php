<?php

use yii\db\Migration;

class m190612_071940_create_ruang extends Migration
{
    public function up()
    {
      $this->createTable('ruang',[
        'id' => $this->primaryKey(),
        'nama' => $this->string(100),
        'tempat' => $this->text(),
        
      ]);
    }

    public function down()
    {
        echo "m190612_071940_create_ruang cannot be reverted.\n";

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
