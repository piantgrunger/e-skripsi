<?php

use yii\db\Migration;

/**
 * Class m181106_104522_create_sppd.
 */
class m181106_104522_create_sppd extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_mt_spt', 'kendaraan', $this->string(50));
        $this->addColumn('tb_mt_spt', 'id_kegiatan', $this->integer()->null());
        $this->addColumn('tb_mt_spt', 'id_kota', $this->integer()->null());
        $this->addForeignKey(
            'saadsda',
            'tb_mt_spt',
            'id_kegiatan',
            'tb_m_kegiatan',
            'id_kegiatan'
        );
        $this->addForeignKey(
            'fddsfas',
            'tb_mt_spt',
            'id_kota',
            'tb_m_kota',
            'id_kota'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181106_104522_create_sppd cannot be reverted.\n";

        return false;
    }
    */
}
