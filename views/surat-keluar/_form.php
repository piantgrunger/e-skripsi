<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'jenis_surat_id')->textInput() ?>

    <?= $form->field($model, 'tgl_surat')->textInput() ?>

    <?= $form->field($model, 'nomor_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perihal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lampiran_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salam_awal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi_surat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'salam_akhir_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan_pengirim_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pengirim_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip_surat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
