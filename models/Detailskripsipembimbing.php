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
            [['nip_dosen'], 'string', 'max' => 50],
            [['validasi_sempro'], 'string', 'max' => 20],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSkripsi()
    {
        return $this->hasOne(Skripsi::className(), ['id' => 'id_skripsi']);
    }
}
