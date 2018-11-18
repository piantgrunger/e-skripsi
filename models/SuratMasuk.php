<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

use yii\db\Expression;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id
 * @property int $jenis_surat_id
 * @property string $tgl_surat
 * @property string $nomor_surat
 * @property string $perihal_surat
 * @property string $lampiran_surat
 * @property string $alamat_surat
 * @property string $salam_awal_surat
 * @property string $isi_surat
 * @property string $salam_akhir_surat
 * @property string $jabatan_pengirim_surat
 * @property string $nama_pengirim_surat
 * @property string $nip_surat
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property JenisSurat $jenisSurat
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
                  [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
                // if you're using datetime instead of UNIX timestamp:
            ],
        ];
    }
    public static function tableName()
    {
        return 'surat_masuk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_surat_id', 'tgl_surat', 'nomor_surat', 'perihal_surat', 'lampiran_surat', 'salam_awal_surat', 'salam_akhir_surat', 'jabatan_pengirim_surat', 'nama_pengirim_surat', 'nip_surat','kepada_surat'], 'required'],
            [['jenis_surat_id', 'created_by', 'updated_by'], 'integer'],
            [['tgl_surat', 'created_at', 'updated_at'], 'safe'],
            [['isi_surat'], 'string'],
            [['nomor_surat', 'perihal_surat', 'lampiran_surat', 'salam_awal_surat', 'salam_akhir_surat', 'jabatan_pengirim_surat', 'nama_pengirim_surat', 'nip_surat'], 'string', 'max' => 50],
            [['alamat_surat'], 'string', 'max' => 150],
            [['jenis_surat_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisSurat::className(), 'targetAttribute' => ['jenis_surat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'jenis_surat_id' => Yii::t('app', 'Jenis Surat'),
            'tgl_surat' => Yii::t('app', 'Tgl Surat'),
            'nomor_surat' => Yii::t('app', 'Nomor Surat'),
            'perihal_surat' => Yii::t('app', 'Perihal Surat'),
            'lampiran_surat' => Yii::t('app', 'Lampiran Surat'),
            'alamat_surat' => Yii::t('app', 'Alamat Surat'),
            'salam_awal_surat' => Yii::t('app', 'Salam Awal Surat'),
            'isi_surat' => Yii::t('app', 'Isi Surat'),
            'salam_akhir_surat' => Yii::t('app', 'Salam Akhir Surat'),
            'jabatan_pengirim_surat' => Yii::t('app', 'Jabatan Pengirim Surat'),
            'nama_pengirim_surat' => Yii::t('app', 'Nama Pengirim Surat'),
            'nip_surat' => Yii::t('app', 'Nip Surat'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSurat()
    {
        return $this->hasOne(JenisSurat::className(), ['id' => 'jenis_surat_id']);
    }
}
