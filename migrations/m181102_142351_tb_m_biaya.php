<?php

use yii\db\Migration;

/**
 * Class m181102_142351_tb_m_biaya
 */
class m181102_142351_tb_m_biaya extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_tarif', [
            'id_tarif' => $this->primaryKey(),
            'id_pangkat' => $this->integer()->notNull(),
            'tujuan' =>$this->string(100),
            'nama_biaya' =>$this->string()->notNull(),
            'biaya' =>$this->decimal(18, 2)->notNull(),
        ]);
        $this->addForeignKey(
            'fk_id_pangkat_biaya',
            'tb_m_tarif',
            'id_pangkat',
            'tb_m_pangkat',
            'id_pangkat'

        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_m_tarif');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181102_142351_tb_m_biaya cannot be reverted.\n";

        return false;
    }
    */
}
