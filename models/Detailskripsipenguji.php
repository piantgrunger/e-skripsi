<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailskripsipenguji".
 *
 * @property integer $id
 * @property integer $id_skripsi
 * @property string $nip_dosen
 *
 * @property Skripsi $idSkripsi
 */
class Detailskripsipenguji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailskripsipenguji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_skripsi'], 'integer'],
            [['nip_dosen'], 'required'],
            [['nip_dosen','nilai','revisi','nilai_akhir'], 'string', 'max' => 50],
            [['id_skripsi'], 'exist', 'skipOnError' => true, 'targetClass' => Skripsi::className(), 'targetAttribute' => ['id_skripsi' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_skripsi' => 'Id Skripsi',
            'nip_dosen' => 'Nip Dosen',
        ];
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
