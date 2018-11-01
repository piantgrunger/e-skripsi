<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_m_pangkat}}".
 *
 * @property int $id_pangkat
 * @property string $nama_pangkat
 */
class Pangkat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tb_m_pangkat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pangkat'], 'string', 'max' => 50],
            [['nama_pangkat'], 'unique'],
            [['nama_pangkat'], 'required'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pangkat' => Yii::t('app', 'Id Pangkat'),
            'nama_pangkat' => Yii::t('app', 'Nama Pangkat'),
        ];
    }
}
