<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pangkat;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$data = ArrayHelper::map(Pangkat::find()->select(['id_pangkat','nama_pangkat'])->asArray()
        ->all(), 'id_pangkat', 'nama_pangkat');
/* @var $this yii\web\View */
/* @var $model app\models\Tarif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_pangkat')->widget(Select2::className(), [
          'data' => $data,
        'options' => ['placeholder' => 'Pilih Pangkat...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <?= $form->field($model, 'tujuan')->dropDownList([ 'Di Dalam Kabupaten Sidoarjo' => 'Di Dalam Kabupaten Sidoarjo',
'Luar Kabupaten Sidoarjo dalam Propinsi (Zona 1)[Surabaya,Gresik,Mojokerto,Pasuruan]' =>'Luar Kabupaten Sidoarjo dalam Propinsi (Zona 1)[Surabaya,Gresik,Mojokerto,Pasuruan]',
'Luar Kabupaten Sidoarjo di luar zona 1'=>'Luar Kabupaten Sidoarjo di luar zona 1',
'Luar Propinsi Jawa Timur'=>'Luar Propinsi Jawa Timur'


], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_biaya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biaya')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
