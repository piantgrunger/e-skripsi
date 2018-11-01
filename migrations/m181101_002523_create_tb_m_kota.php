<?php

use yii\db\Migration;
use League\Csv\Reader;

/**
 * Class m181101_002523_create_tb_m_kota
 */
class m181101_002523_create_tb_m_kota extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_kota', [
            'id_kota' => $this->primaryKey(),
            'nama_kota' => $this->string(50)->notNull(),
            'lingkup' =>$this->string(50)->notNull()
        ]);
        $source = Yii::getAlias('@app/migrations/kota.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($source);
        // insert data provinsi kedalam tabel provinsi
        //cek max_allowed_packet di my.ini
        $Rows = array();
        foreach ($reader as $index => $row) {
            if ($row[1]!=="") {
                array_push(
                $Rows,
                [
                    $row[0],
                    $row[1],
                    $row[2],
                ]
            );
            }
        }

        $this->batchInsert('tb_m_kota', ['id_kota', 'nama_kota', 'lingkup'], $Rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181101_002523_create_tb_m_kota cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181101_002523_create_tb_m_kota cannot be reverted.\n";

        return false;
    }
    */
}
