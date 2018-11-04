<?php

use yii\db\Migration;
use League\Csv\Reader;
use app\models\Pangkat;

/**
 * Class m181104_000113_tb_d_alat
 */
class m181104_000113_tb_d_alat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_d_alat_kelengkapan', [
            'id_d_alat_kelengkapan' => $this->primaryKey(),

            'id_alat_kelengkapan' => $this->integer(),
             'id_personil' => $this->integer(),
             'jenis' => "enum('Ketua','Wakil Ketua','Sekretaris','Anggota','Staff','Ketua DPRD','Wakil Ketua DPRD' )"
        ]);
        $this->addForeignKey(
            'fk_id_alkel',
            'tb_d_alat_kelengkapan',
            'id_alat_kelengkapan',
            'tb_m_alat_kelengkapan',
            'id_alat_kelengkapan',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'fk_id_alkel_personel',
            'tb_d_alat_kelengkapan',
            'id_personil',
            'tb_m_personil',
            'id_personil'

        );
        $source = Yii::getAlias('@app/migrations/tb_kelompok.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($source);
        // insert data provinsi kedalam tabel provinsi
        //cek max_allowed_packet di my.ini
        $Rows = array();
        foreach ($reader as $index => $row) {
            $pangkat = Pangkat::find()->where("id_pangkat='$row[3]'")->one();

            array_push(
                    $Rows,
                    [
                        $row[0],
                        $row[1],
                        $row[2],
                        $pangkat->nama_pangkat,

                    ]
                );
        }

        $this->batchInsert('tb_d_alat_kelengkapan', [ 'id_d_alat_kelengkapan', 'id_alat_kelengkapan','id_personil','jenis'], $Rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_d_alat_kelengkapan');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181104_000113_tb_d_alat cannot be reverted.\n";

        return false;
    }
    */
}
