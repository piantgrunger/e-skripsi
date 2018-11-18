<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\JenisSurat;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use dosamigos\ckeditor\CKEditor;

$data =ArrayHelper::map(
    JenisSurat::find()->select(['id', 'nama_jenis_surat'])->asArray()->all(),
    'id',
    'nama_jenis_surat'

)

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'jenis_surat_id')->widget(Select2::className(), [
        'data' =>$data,
            'options' => ['placeholder' => 'Pilih Jenis Surat...'],
        'pluginOptions' => [
            'allowClear' => true,

        ],
    ]) ?>

    <?= $form->field($model, 'tgl_surat')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'nomor_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perihal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lampiran_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salam_awal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi_surat')->widget(CKEditor::className(), [        'options' => ['rows' => 16],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'salam_akhir_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan_pengirim_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pengirim_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip_surat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
