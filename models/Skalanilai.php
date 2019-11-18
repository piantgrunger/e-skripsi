<?php

namespace app\models;

use Yii;

class Skalanilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akademik.ak_skalanilai';
    }
    public static function getDb()
    {
        return Yii::$app->get('db_siakad');
    }


} 