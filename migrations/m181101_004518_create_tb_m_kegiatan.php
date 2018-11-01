<?php

use yii\db\Migration;
use League\Csv\Reader;

/**
 * Class m181101_004518_create_tb_m_kegiatan
 */
class m181101_004518_create_tb_m_kegiatan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_kegiatan', [
            'id_kegiatan' => $this->primaryKey(),
            'nama_kegiatan' => $this->string(50)->notNull(),
            'Rekening' => $this->string(50)->notNull(),
           'Daerah' => " Enum('Dalam Daerah','Luar Daerah','Luar Negeri')"

        ]);
        $source = Yii::getAlias('@app/migrations/kegiatan.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($source);
        // insert data provinsi kedalam tabel provinsi
        //cek max_allowed_packet di my.ini
        $Rows = array();
        foreach ($reader as $index => $row) {
            if ($row[4] !== "1") {
                array_push(
                    $Rows,
                    [
                        $row[1],
                        $row[2],
                        $row[3],
                    ]
                );
            }
        }

        $this->batchInsert('tb_m_kegiatan', [ 'nama_kegiatan', 'rekening','daerah'], $Rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181101_004518_create_tb_m_kegiatan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181101_004518_create_tb_m_kegiatan cannot be reverted.\n";

        return false;
    }
    */
}
