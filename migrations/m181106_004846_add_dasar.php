<?php

use yii\db\Migration;

/**
 * Class m181106_004846_add_dasar
 */
class m181106_004846_add_dasar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_mt_spt', 'dasar', $this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181106_004846_add_dasar cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181106_004846_add_dasar cannot be reverted.\n";

        return false;
    }
    */
}
