<?php

use yii\db\Migration;
use League\Csv\Reader;

/**
 * Class m181031_230937_create_tb_m_alat_kelengkapan
 */
class m181031_230937_create_tb_m_alat_kelengkapan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_alat_kelengkapan', [
            'id_alat_kelengkapan' => $this->primaryKey(),
             'alat_kelengkapan' => $this->string(50),
             'tahun' =>$this->integer()
        ]);
        $source = Yii::getAlias('@app/migrations/alat_kelengkapan.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($source);
        // insert data provinsi kedalam tabel provinsi
        //cek max_allowed_packet di my.ini
        $Rows = array();
        foreach ($reader as $index => $row) {
            array_push(
                $Rows,
                [
                    $row[0],
                    $row[1],
                    $row[2],
                ]
            );
        }
        $this->batchInsert('tb_m_alat_kelengkapan', ['id_alat_kelengkapan', 'alat_kelengkapan','tahun'], $Rows);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181031_230937_create_tb_m_alat_kelengkapan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181031_230937_create_tb_m_alat_kelengkapan cannot be reverted.\n";

        return false;
    }
    */
}
