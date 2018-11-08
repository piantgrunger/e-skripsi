<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_sdt_spt".
 *
 * @property int     $id_sd_spt
 * @property int     $id_d_spt
 * @property int     $id_spt
 * @property string  $nama_biaya
 * @property string  $anggaran
 * @property string  $realisasi
 * @property TbDtSpt $dSpt
 * @property TbMtSpt $spt
 */
class SubSuratPerintahTugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_sdt_spt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_d_spt', 'id_spt'], 'integer'],
            [['anggaran', 'realisasi'], 'number'],
            [['nama_biaya'], 'string', 'max' => 100],
            [['id_d_spt'], 'exist', 'skipOnError' => true, 'targetClass' => DetSuratPerintahTugas::className(), 'targetAttribute' => ['id_d_spt' => 'id_d_spt']],
            [['id_spt'], 'exist', 'skipOnError' => true, 'targetClass' => SuratPerintahTugas::className(), 'targetAttribute' => ['id_spt' => 'id_spt']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sd_spt' => Yii::t('app', 'Id Sd Spt'),
            'id_d_spt' => Yii::t('app', 'Id D Spt'),
            'id_spt' => Yii::t('app', 'Id Spt'),
            'nama_biaya' => Yii::t('app', 'Nama Biaya'),
            'anggaran' => Yii::t('app', 'Anggaran'),
            'realisasi' => Yii::t('app', 'Realisasi'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDSpt()
    {
        return $this->hasOne(DetSuratPerintahTugas::className(), ['id_d_spt' => 'id_d_spt']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpt()
    {
        return $this->hasOne(SuratPerintahTugas::className(), ['id_spt' => 'id_spt']);
    }

    public function getDurasi()
    {
        return is_null($this->spt) ? 0 : $this->spt->selisih;
    }
}
