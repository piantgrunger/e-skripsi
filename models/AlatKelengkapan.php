<?php

namespace app\models;

use mdm\behaviors\ar\RelationTrait;

use Yii;

/**
 * This is the model class for table "{{%tb_m_alat_kelengkapan}}".
 *
 * @property int $id_alat_kelengkapan
 * @property string $alat_kelengkapan
 * @property int $tahun
 */
class AlatKelengkapan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    use RelationTrait;
    public static function tableName()
    {
        return '{{%tb_m_alat_kelengkapan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun'], 'integer'],
            [['alat_kelengkapan'], 'string', 'max' => 50],
           [['tahun','alat_kelengkapan'],'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alat_kelengkapan' => Yii::t('app', 'Id Alat Kelengkapan'),
            'alat_kelengkapan' => Yii::t('app', 'Alat Kelengkapan'),
            'tahun' => Yii::t('app', 'Tahun'),
        ];
    }

    public function getDetailAlatKelengkapan()
    {
        return $this->hasMany(DetAlatKelengkapan::className(), ['id_alat_kelengkapan' => 'id_alat_kelengkapan']);
    }
    public function setDetailAlatKelengkapan($value)
    {
        return $this->loadRelated('detailAlatKelengkapan', $value);
    }
}
