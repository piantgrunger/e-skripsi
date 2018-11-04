<?php

use yii\db\Migration;
use League\Csv\Reader;
use app\models\Pangkat;

/**
 * Class m181102_164948_tb_m_personil
 */
class m181102_164948_tb_m_personil extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_personil', [
            'id_personil' => $this->primaryKey(),
            'nip' => $this->string(50)->notNull(),

            'nama_personil' => $this->string(50)->notNull(),
            'status_personil' => "enum('Dewan','Staff') not null ",
            'golongan' => "enum('Gol I','Gol II','Gol III','Gol IV','Eselon I','Eselon II','Eselon III','Eselon IV')",
            'id_pangkat' => $this->integer(),
            'setuju' => $this->integer(),
            'mengetahui' => $this->integer(),
            'lunas' => $this->integer(),
            'tanda_tangan_surat' => $this->integer()

        ]);

        $this->addForeignKey(
            'fk_id_personil_biaya',
            'tb_m_personil',
            'id_pangkat',
            'tb_m_pangkat',
            'id_pangkat'

        );

        $source = Yii::getAlias('@app/migrations/personil.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($source);
        // insert data provinsi kedalam tabel provinsi
        //cek max_allowed_packet di my.ini
        $Rows = array();
        foreach ($reader as $index => $row) {
            $pangkat = Pangkat::find()->where("nama_pangkat='$row[3]'")->one();
            array_push(
                    $Rows,
                    [
                        $row[0],
                          $row[2],
                        $row[1],
                          $row[6],

                        $row[7],
                        is_null($pangkat)?null:$pangkat->id_pangkat,
                        ($row[9]=='null')?null:$row[9],
                        ($row[10]=='null')?0:$row[10],
                        ($row[11]=='null')?0:$row[11],
                        ($row[8]=='null')?0:$row[8],

                    ]
                );
        }

        $this->batchInsert('tb_m_personil', [ 'id_personil', 'nip','nama_personil','status_personil','golongan','id_pangkat','setuju','mengetahui','lunas','tanda_tangan_surat'], $Rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_m_personil');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181102_164948_tb_m_personil cannot be reverted.\n";

        return false;
    }
    */
}
