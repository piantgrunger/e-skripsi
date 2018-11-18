<?php

use yii\db\Migration;

/**
 * Class m181113_093652_jenis_surat
 */
class m181113_093652_jenis_surat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('jenis_surat', [
            'id' => $this->primaryKey(),
            'nama_jenis_surat' => $this->string(50),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181113_093652_jenis_surat cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181113_093652_jenis_surat cannot be reverted.\n";

        return false;
    }
    */
}
