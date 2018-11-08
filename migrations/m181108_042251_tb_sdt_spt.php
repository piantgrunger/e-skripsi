<?php

use yii\db\Migration;

/**
 * Class m181108_042251_tb_sdt_spt.
 */
class m181108_042251_tb_sdt_spt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_sdt_spt', [
               'id_sd_spt' => $this->primaryKey(),
               'id_d_spt' => $this->integer(),
               'id_spt' => $this->integer(),
               'nama_biaya' => $this->string(100),
               'anggaran' => $this->decimal(19, 2),
               'realisasi' => $this->decimal(19, 2),
            ]);

        $this->addForeignKey(
                'sdt_spt_d',
                'tb_sdt_spt',
                'id_d_spt',
                'tb_dt_spt',
                'id_d_spt',
                'CASCADE',
                'CASCADE'
            );

        $this->addForeignKey(
            'sdt_spt_m',
            'tb_sdt_spt',
            'id_spt',
            'tb_mt_spt',
            'id_spt',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_sdt_spt');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181108_042251_tb_sdt_spt cannot be reverted.\n";

        return false;
    }
    */
}
