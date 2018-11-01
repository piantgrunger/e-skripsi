<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_m_kota}}".
 *
 * @property int $id_kota
 * @property string $nama_kota
 * @property string $lingkup
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tb_m_kota}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kota', 'lingkup'], 'required'],
            [['nama_kota', 'lingkup'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kota' => Yii::t('app', 'Id Kota'),
            'nama_kota' => Yii::t('app', 'Nama Kota'),
            'lingkup' => Yii::t('app', 'Lingkup'),
        ];
    }
}
