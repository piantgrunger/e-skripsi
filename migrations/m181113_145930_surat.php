<?php

use yii\db\Migration;

/**
 * Class m181113_145930_surat
 */
class m181113_145930_surat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('surat_masuk', [
                'id' => $this->primaryKey(),
                'jenis_surat_id' => $this->integer()->notNull(),
                'tgl_surat' => $this->date()->notNull(),
                'nomor_surat' => $this->string(50)->notNull(),
                'perihal_surat' => $this->string(50)->notNull(),
                'lampiran_surat' => $this->string(50)->notNull(),
                'alamat_surat' => $this->string(150),
                'salam_awal_surat' => $this->string(50)->notNull(),
                'isi_surat' => $this->text(),
                'salam_akhir_surat' => $this->string(50)->notNull(),
                'jabatan_pengirim_surat' => $this->string(50)->notNull(),
                'nama_pengirim_surat' => $this->string(50)->notNull(),
               'nip_surat' => $this->string(50)->notNull(),
                      'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),





            ]);
        $this->addForeignKey(
                'fk_jenis_surat_masuk',
                'surat_masuk',
                'jenis_surat_id',
                'jenis_surat',
                'id'
            );

        $this->createTable('surat_keluar', [
                'id' => $this->primaryKey(),
                'jenis_surat_id' => $this->integer()->notNull(),
                'tgl_surat' => $this->date()->notNull(),
                'nomor_surat' => $this->string(50)->notNull(),
                'perihal_surat' => $this->string(50)->notNull(),
                'lampiran_surat' => $this->string(50)->notNull(),
                'alamat_surat' => $this->string(150),
                'salam_awal_surat' => $this->string(50)->notNull(),
                'isi_surat' => $this->text()->notNull(),
                'salam_akhir_surat' => $this->string(50)->notNull(),
                'jabatan_pengirim_surat' => $this->string(50)->notNull(),
                'nama_pengirim_surat' => $this->string(50)->notNull(),
               'nip_surat' => $this->string(50)->notNull(),
                      'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),





            ]);
        $this->addForeignKey(
                'fk_jenis_surat_keluar',
                'surat_keluar',
                'jenis_surat_id',
                'jenis_surat',
                'id'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('surat_keluar');
        $this->dropTable('surat_masuk');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181113_145930_surat cannot be reverted.\n";

        return false;
    }
    */
}
