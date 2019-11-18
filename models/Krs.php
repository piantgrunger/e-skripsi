<?php

namespace app\models;

use Yii;

class Krs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akademik.ak_krs';
    }
    public static function getDb()
    {
        return Yii::$app->get('db_siakad');
    }
    
    public function rules()
    {
        return [
            [['nnumerik', 'nangka','nhuruf','lulus','dipakai','nilaimasuk','ulang','autonilai','t_updateuser','t_updateip','t_updateact'], 'required'],
        
        ];
    }
} 