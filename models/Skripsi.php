<?php

namespace app\models;

use Yii;
use mdm\behaviors\ar\RelationTrait;

/**
 * This is the model class for table "skripsi".
 *
 * @property integer $id
 * @property string $nim
 * @property string $judul_skripsi
 * @property string $proposal
 * @property string $kartu_bimbingan
 *
 * @property Detailskripsipembimbing[] $detailskripsipembimbings
 */
class Skripsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    use RelationTrait;
    public static function tableName()
    {
        return 'skripsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim', 'judul_skripsi'], 'required'],
            [['judul_skripsi'], 'string'],
            [['nim', 'proposal', 'kartu_bimbingan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nim' => Yii::t('app', 'Nim'),
            'judul_skripsi' => Yii::t('app', 'Judul Skripsi'),
            'proposal' => Yii::t('app', 'Proposal'),
            'kartu_bimbingan' => Yii::t('app', 'Kartu Bimbingan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailskripsipembimbings()
    {
        return $this->hasMany(Detailskripsipembimbing::className(), ['id_skripsi' => 'id']);
    }
    public function setDetailskripsipembimbings($value)
    {
        return $this->loadRelated('detailskripsipembimbings',$value);
    }

    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
    }

    public function getNama_mahasiswa(){
        return is_null($this->mahasiswa)?"":$this->mahasiswa->nama;
    } 
    public function getNama_prodi(){
        return is_null($this->mahasiswa)?"":$this->mahasiswa->nama_prodi;
    } 
}
