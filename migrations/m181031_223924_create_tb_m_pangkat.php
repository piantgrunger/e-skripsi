<?php

use yii\db\Migration;
use League\Csv\Reader;

/**
 * Class m181031_223924_create_tb_m_pangkat
 */
class m181031_223924_create_tb_m_pangkat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_pangkat', [
            'id_pangkat' => $this->primaryKey(),
            'nama_pangkat' =>$this->string(50)->unique()
        ]);

        // path tempat file csv berada
        $source = Yii::getAlias('@app/migrations/pangkat.csv');
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
                ]
            );
        }
        $this->batchInsert('tb_m_pangkat', ['id_pangkat', 'nama_pangkat'], $Rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181031_223924_create_tb_m_pangkat cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181031_223924_create_tb_m_pangkat cannot be reverted.\n";

        return false;
    }
    */
}
