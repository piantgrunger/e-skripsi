<?php

use yii\db\Migration;

/**
 * Class m181105_083913_tb_m_spt.
 */
class m181105_083913_tb_m_spt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_mt_spt', [
            'id_spt' => $this->primaryKey(),
            'no_spt' => $this->string(50)->notNull(),
            'tgl_surat' => $this->date()->notNull(),
            'id_alat_kelengkapan' => $this->integer(),
            'untuk' => $this->text()->notNull(),
            'tujuan' => $this->text()->notNull(),
            'zona' => $this->string(100)->notNull(),
            'tgl_awal' => $this->date()->notNull(),
            'tgl_akhir' => $this->date(),
            'penanda_tangan' => $this->string(100),
        ]);
        $this->addForeignKey(
            'fk_id_SPT',
            'tb_mt_spt',
            'id_alat_kelengkapan',
            'tb_m_alat_kelengkapan',
            'id_alat_kelengkapan'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_mt_spt');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_083913_tb_m_spt cannot be reverted.\n";

        return false;
    }
    */
}
