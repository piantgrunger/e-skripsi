<?php

use yii\db\Migration;

class m190508_014827_alterSkripsi extends Migration
{
    public function up()
    {
        $this->addColumn('skripsi','kode_unit',$this->string(10));
    }

    public function down()
    {
        echo "m190508_014827_alterSkripsi cannot be reverted.\n";

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
