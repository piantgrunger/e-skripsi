<?php

use yii\db\Migration;

/**
 * Class m181105_105052_tb_d_spt.
 */
class m181105_105052_tb_d_spt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_dt_spt', [
            'id_d_spt' => $this->primaryKey(),

            'id_spt' => $this->integer(),
             'id_personil' => $this->integer(),
             'jenis' => "enum('Ketua','Wakil Ketua','Sekretaris','Anggota','Staff','Ketua DPRD','Wakil Ketua DPRD' )",
        ]);
        $this->addForeignKey(
            'fk_id_spt1',
            'tb_dt_spt',
            'id_spt',
            'tb_mt_spt',
            'id_spt',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_id_spt_personel',
            'tb_dt_spt',
            'id_personil',
            'tb_m_personil',
            'id_personil'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181105_105052_tb_d_spt cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_105052_tb_d_spt cannot be reverted.\n";

        return false;
    }
    */
}
