<?php

namespace app\models;

use Yii;
use mdm\behaviors\ar\RelationTrait;
use yii\web\UploadedFile;

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
   public $id_skripsi;
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
             [['id_skripsi'],'safe'],
            [['tanggal_sidang','jam_sidang','id_ruang'],'safe'],
               [[ 'proposal', 'kartu_bimbingan','laporan'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf,doc,docx,txt,jpeg,jpg,xls,xlsx', 'maxSize' => 5000000],
       
          
            [['nim'], 'string', 'max' => 50],
          ['tanggal_sidang','checkTanggal','on'=>'sidang']
          
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
   
  public function checkTanggal($attribute, $params) {
    


     if ($this->status_sidang =="non valid") {
         $this->addError($attribute, 'Skripsi Tidak Dapat Diajukan Sidang Sebab Belum Divalidasi Pembimbing ');
        return false;

       
     }
  }
  
  public function upload($fieldName)
    {
        $path = Yii::getAlias('@app') . '/web/document/';
        //s  die($fieldName);
        $image = UploadedFile::getInstance($this, $fieldName);
        if (!empty($image) && $image->size !== 0) {
            $fileNames = $fieldName . $this->nim .md5(microtime()) . '.' . $image->extension;
          
            if ($image->saveAs($path . $fileNames)) {
                $this->attributes = [$fieldName => $fileNames];
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
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
    public function getDetailskripsipengujis()
    {
        return $this->hasMany(Detailskripsipenguji::className(), ['id_skripsi' => 'id']);
    }
    public function setDetailskripsipengujis($value)
    {
        return $this->loadRelated('detailskripsipengujis',$value);
    }
    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
    }
      public function getRuang()
    {
        return $this->hasOne(Ruang::className(), ['id' => 'id_ruang']);
    }
  
    public function getStatus_sidang()
    {
      $data = Detailskripsipembimbing::find()->where(["id_skripsi"=>$this->id,'validasi_sidang'=>'Belum Validasi'])->one();
      return is_null($data)?'valid' :'non valid';
      
    }  

    public function getRuang_sidang(){
        return is_null($this->ruang)?"":$this->ruang->nama;
    } 
  public function getNama_mahasiswa(){
        return is_null($this->mahasiswa)?"":$this->mahasiswa->nama;
    } 
    public function getNama_prodi(){
        return is_null($this->mahasiswa)?"":$this->mahasiswa->nama_prodi;
    } 
    public function getNama_pembimbing(){
         $nama='';
         foreach($this->detailskripsipembimbings as $detail) {
           $nama .= $detail->dosen->nama."<br>";
         }
        return $nama;
    } 
   public function getNama_penguji(){
         $nama='';
         foreach($this->detailskripsipengujis as $detail) {
           $nama .= $detail->dosen->nama."<br>";
         }
        return $nama;
    } 
  
}
