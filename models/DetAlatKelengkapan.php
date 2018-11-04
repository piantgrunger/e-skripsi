<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_d_alat_kelengkapan}}".
 *
 * @property int $id_d_alat_kelengkapan
 * @property int $id_alat_kelengkapan
 * @property int $id_personil
 * @property string $jenis
 *
 * @property TbMAlatKelengkapan $alatKelengkapan
 * @property TbMPersonil $personil
 */
class DetAlatKelengkapan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tb_d_alat_kelengkapan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alat_kelengkapan', 'id_personil'], 'integer'],
            [['jenis'], 'string'],
            [['id_alat_kelengkapan'], 'exist', 'skipOnError' => true, 'targetClass' => AlatKelengkapan::className(), 'targetAttribute' => ['id_alat_kelengkapan' => 'id_alat_kelengkapan']],
            [['id_personil'], 'exist', 'skipOnError' => true, 'targetClass' => Personil::className(), 'targetAttribute' => ['id_personil' => 'id_personil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_d_alat_kelengkapan' => Yii::t('app', 'Id D Alat Kelengkapan'),
            'id_alat_kelengkapan' => Yii::t('app', 'Id Alat Kelengkapan'),
            'id_personil' => Yii::t('app', 'Id Personil'),
            'jenis' => Yii::t('app', 'Jenis'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlatKelengkapan()
    {
        return $this->hasOne(AlatKelengkapan::className(), ['id_alat_kelengkapan' => 'id_alat_kelengkapan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonil()
    {
        return $this->hasOne(Personil::className(), ['id_personil' => 'id_personil']);
    }
    public function getPangkat()
    {
        return is_null($this->personil)?"":$this->personil->nama_pangkat;
    }
    public function getStatus_personil()
    {
        return is_null($this->personil) ? "" : $this->personil->status_personil;
    }
    public function getNama_personil()
    {
        return is_null($this->personil) ? "" : $this->personil->nama_personil;
    }
}
