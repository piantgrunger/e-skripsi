<?php

use yii\db\Migration;

/**
 * Class m181105_022236_update_data
 */
class m181105_022236_update_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("delete FROM tb_d_alat_kelengkapan where id_personil in(
select id_personil  from tb_m_personil where id_personil in (
109,
102,
116)
    )");
        $this->execute("insert into tb_d_alat_kelengkapan (id_alat_kelengkapan,id_personil,jenis) select DISTINCT id_alat_kelengkapan,p.id_personil,case when p.id_personil='102' then 'Ketua DPRD' else 'Wakil Ketua DPRD' end from tb_d_alat_kelengkapan,tb_m_personil p where p.id_personil in ( 109, 102, 116)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181105_022236_update_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_022236_update_data cannot be reverted.\n";

        return false;
    }
    */
}
