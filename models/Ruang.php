<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruang".
 *
 * @property integer $id
 * @property string $nama
 * @property string $tempat
 */
class Ruang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ruang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempat'], 'string'],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tempat' => 'Tempat',
        ];
    }
}
