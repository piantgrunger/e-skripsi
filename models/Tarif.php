<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_m_tarif}}".
 *
 * @property int $id_tarif
 * @property int $id_pangkat
 * @property string $tujuan
 * @property string $nama_biaya
 * @property string $biaya
 *
 * @property TbMPangkat $pangkat
 */
class Tarif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tb_m_tarif}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pangkat', 'tujuan', 'nama_biaya', 'biaya'], 'required'],
            [['id_pangkat'], 'integer'],
            [['tujuan'], 'string'],
            [['biaya'], 'number'],
            [['nama_biaya'], 'string', 'max' => 255],
            [['id_pangkat'], 'exist', 'skipOnError' => true, 'targetClass' => Pangkat::className(), 'targetAttribute' => ['id_pangkat' => 'id_pangkat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tarif' => Yii::t('app', 'Id Tarif'),
            'id_pangkat' => Yii::t('app', 'Pangkat'),
            'tujuan' => Yii::t('app', 'Tujuan'),
            'nama_biaya' => Yii::t('app', 'Nama Biaya'),
            'biaya' => Yii::t('app', 'Biaya'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPangkat()
    {
        return $this->hasOne(Pangkat::className(), ['id_pangkat' => 'id_pangkat']);
    }
    public function getNama_pangkat()
    {
        return is_null($this->pangkat)?"":$this->pangkat->nama_pangkat;
    }
}
