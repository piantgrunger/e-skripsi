<?php

use yii\db\Migration;

/**
 * Class m181113_162113_alter_surat
 */
class m181113_162113_alter_surat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('surat_masuk', 'kepada_surat', $this->string(100)->notNull());
        $this->addColumn('surat_keluar', 'kepada_surat', $this->string(100)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181113_162113_alter_surat cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181113_162113_alter_surat cannot be reverted.\n";

        return false;
    }
    */
}
