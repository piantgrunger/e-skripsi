<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_dt_spt".
 *
 * @property int         $id_d_spt
 * @property int         $id_spt
 * @property int         $id_personil
 * @property string      $jenis
 * @property TbMtSpt     $spt
 * @property TbMPersonil $personil
 */
class DetSuratPerintahTugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_dt_spt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spt', 'id_personil'], 'integer'],
            [['jenis'], 'string'],
            [['id_spt'], 'exist', 'skipOnError' => true, 'targetClass' => SuratPerintahTugas::className(), 'targetAttribute' => ['id_spt' => 'id_spt']],
            [['id_personil'], 'exist', 'skipOnError' => true, 'targetClass' => Personil::className(), 'targetAttribute' => ['id_personil' => 'id_personil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_d_spt' => Yii::t('app', 'Id D Spt'),
            'id_spt' => Yii::t('app', 'Id Spt'),
            'id_personil' => Yii::t('app', 'Id Personil'),
            'jenis' => Yii::t('app', 'Jenis'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function geSuratPerintahTugas()
    {
        return $this->hasOne(SuratPerintahTugas::className(), ['id_spt' => 'id_spt']);
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
        return is_null($this->personil) ? '' : $this->personil->nama_pangkat;
    }

    public function getStatus_personil()
    {
        return is_null($this->personil) ? '' : $this->personil->status_personil;
    }

    public function getNama_personil()
    {
        return is_null($this->personil) ? '' : $this->personil->nama_personil;
    }

    public function getNip()
    {
        return is_null($this->personil) ? '' : $this->personil->nip;
    }
}
