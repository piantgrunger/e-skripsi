<?php

use yii\db\Migration;

/**
 * Class m181106_062219_alter_tb_mt_spt.
 */
class m181106_062219_alter_tb_mt_spt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_mt_spt', 'jenis', $this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181106_062219_alter_tb_mt_spt cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181106_062219_alter_tb_mt_spt cannot be reverted.\n";

        return false;
    }
    */
}
