<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jenis_surat_id') ?>

    <?= $form->field($model, 'tgl_surat') ?>

    <?= $form->field($model, 'nomor_surat') ?>

    <?= $form->field($model, 'perihal_surat') ?>

    <?php // echo $form->field($model, 'lampiran_surat') ?>

    <?php // echo $form->field($model, 'alamat_surat') ?>

    <?php // echo $form->field($model, 'salam_awal_surat') ?>

    <?php // echo $form->field($model, 'isi_surat') ?>

    <?php // echo $form->field($model, 'salam_akhir_surat') ?>

    <?php // echo $form->field($model, 'jabatan_pengirim_surat') ?>

    <?php // echo $form->field($model, 'nama_pengirim_surat') ?>

    <?php // echo $form->field($model, 'nip_surat') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
