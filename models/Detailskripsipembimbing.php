<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailskripsipembimbing".
 *
 * @property integer $id
 * @property integer $id_skripsi
 * @property string $nip_dosen
 * @property string $validasi_sempro
 *
 * @property Skripsi $idSkripsi
 */
class Detailskripsipembimbing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailskripsipembimbing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_skripsi'], 'integer'],
            [['nip_dosen'], 'required'],
            [['nilai','revisi','revisi2','revisi3','nilai_akhir','nilai_akhir2','nilai_akhir3','nilai_akhir4'],'safe'],
          [['nilai_akhir','nilai_akhir2','nilai_akhir3','nilai_akhir4'],'number','min'=>1,'max'=>100],
           [['nip_dosen'], 'string', 'max' => 50],
            [['validasi_sempro','validasi_sidang'], 'string', 'max' => 20],
            [['id_skripsi'], 'exist', 'skipOnError' => true, 'targetClass' => Skripsi::className(), 'targetAttribute' => ['id_skripsi' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_skripsi' => Yii::t('app', 'Id Skripsi'),
            'nip_dosen' => Yii::t('app', 'Nip Dosen'),
            'validasi_sempro' => Yii::t('app', 'Validasi Sempro'),
        ];
    }
  
  public function getNilaiHuruf(){
    
    $data = ['4'=>'A','3.5'=>'AB','3' =>'B','2.5' => 'BC'  ,'2' => 'C' ,'1'=>'D' ,'0'=>'E'  ,null =>'' ];
      return $data[(string)$this->nilai];
  }
    public function getNilaiHurufAkhir(){
    
    $data = ['4'=>'A','3.5'=>'AB','3' =>'B','2.5' => 'BC'  ,'2' => 'C' ,'1'=>'D' ,'0'=>'E'  ,null =>'' ];
      return $data[(string)$this->nilai_akhir];
  }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkripsi()
    {
        return $this->hasOne(Skripsi::className(), ['id' => 'id_skripsi']);
    }
  
   public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['nip' => 'nip_dosen']);
    }

}
